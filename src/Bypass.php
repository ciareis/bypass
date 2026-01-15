<?php

namespace Ciareis\Bypass;

use RuntimeException;

class Bypass
{
    /**
     * Default timeout in seconds for server startup.
     */
    private const DEFAULT_TIMEOUT = 5;

    /**
     * Buffer size in bytes for reading server output.
     */
    private const BUFFER_SIZE = 1024;

    /**
     * Internal API router path.
     */
    private const API_ROUTER_PATH = '___api_faker_router';

    /**
     * Polling interval in microseconds.
     */
    private const POLLING_INTERVAL = 50;

    /**
     * Valid HTTP methods.
     */
    private const VALID_HTTP_METHODS = ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'];

    /**
     * Minimum valid HTTP status code.
     */
    private const MIN_STATUS_CODE = 100;

    /**
     * Maximum valid HTTP status code.
     */
    private const MAX_STATUS_CODE = 599;

    /**
     * Minimum valid port number.
     */
    private const MIN_PORT = 1;

    /**
     * Maximum valid port number.
     */
    private const MAX_PORT = 65535;

    protected ?int $port = null;
    protected $process;
    protected array $routes = [];

    /**
     * Opens a new Bypass server instance.
     *
     * @param int|null $port Optional port number. If null or 0, a random port will be used.
     * @return self
     * @throws RuntimeException If the server fails to start.
     */
    public static function open(?int $port = null): self
    {
        $process = new static();

        return $process->handle($port);
    }

    /**
     * Alias for open(). Opens a new Bypass server instance.
     *
     * @param int|null $port Optional port number. If null or 0, a random port will be used.
     * @return self
     * @throws RuntimeException If the server fails to start.
     */
    public static function up(?int $port = null): self
    {
        return static::open($port);
    }

    /**
     * Creates and serves multiple routes at once.
     *
     * @param Route|RouteFile|array ...$routes Routes to serve. Can be Route objects, RouteFile objects, or arrays.
     * @return self
     * @throws RuntimeException If the server fails to start.
     */
    public static function serve(...$routes): self
    {
        $bypass = static::up();

        $routes = is_array($routes[0])
            ? $routes[0]
            : $routes;
        foreach ($routes as $route) {
            if ($route instanceof Route) {
                $bypass->addRoute(...$route->toArray());
                continue;
            }
            if ($route instanceof RouteFile) {
                $bypass->addFileRoute(...$route->toArray());
                continue;
            }
            if (is_array($route)) {
                $bypass->addRoute(...$route);
            }
        }

        return $bypass;
    }

    /**
     * Stops the Bypass server by clearing all routes.
     * The server process remains running.
     *
     * @return self
     */
    public function stop(): self
    {
        $url = $this->getBaseUrl(self::API_ROUTER_PATH);

        \file_get_contents(filename: $url, context: \stream_context_create([
            'http' => [
                'method' => 'DELETE',
                'header' => 'Content-Type: application/json',
                'content' => '{}'
            ],
        ]));

        return $this;
    }

    /**
     * Shuts down the Bypass server process completely.
     *
     * @return self
     */
    public function down(): self
    {
        if (!is_resource($this->process)) {
            return $this;
        }
        $status = proc_get_status($this->process);
        $pid = $status['pid'] ?? null;
        if ($pid) {
            $this->killPid($pid);
        }

        return $this;
    }

    /**
     * Gets the port number the Bypass server is listening on.
     *
     * @return int The port number.
     * @throws RuntimeException If the port is not set (server not started).
     */
    public function getPort(): int
    {
        if ($this->port === null) {
            throw new RuntimeException('Server port is not set. Make sure the server has been started.');
        }

        return $this->port;
    }

    /**
     * Gets the base URL of the Bypass server.
     *
     * @param string|null $path Optional path to append to the base URL.
     * @return string The base URL (e.g., "http://localhost:8080" or "http://localhost:8080/path").
     * @throws RuntimeException If the port is not set (server not started).
     */
    public function getBaseUrl(?string $path = null): string
    {
        if ($this->port === null) {
            throw new RuntimeException('Server port is not set. Make sure the server has been started.');
        }

        if ($path && !str_starts_with($path, '/')) {
            $path = "/" . $path;
        }

        return "http://localhost:{$this->port}{$path}";
    }

    /**
     * Handles the server startup process.
     *
     * @param int|null $port Optional port number. If null or 0, a random port will be used.
     * @return self
     * @throws RuntimeException If the server fails to start or port is invalid.
     */
    public function handle(?int $port = null): self
    {
        $port = $port ?? 0;

        if ($port !== 0 && ($port < self::MIN_PORT || $port > self::MAX_PORT)) {
            throw new RuntimeException(
                "Invalid port number. Port must be between " . self::MIN_PORT . " and " . self::MAX_PORT . "."
            );
        }

        $command = sprintf(
            '%s -S localhost:%d %s',
            PHP_BINARY,
            $port,
            escapeshellarg(__DIR__ . DIRECTORY_SEPARATOR . 'server.php')
        );
        $descriptors = [
            0 => ['pipe', 'r'],
            1 => ['pipe', 'w'],
            2 => ['pipe', 'w'],
        ];
        $this->process = proc_open($command, $descriptors, $pipes);
        if (!is_resource($this->process)) {
            throw new RuntimeException('Failed to start PHP built-in server.');
        }
        stream_set_blocking($pipes[2], false);
        $buffer = '';
        $pattern = '/Development Server \(http:\/\/localhost:(?<port>\d+)\) started/';
        $start = time();
        $timeout = self::DEFAULT_TIMEOUT;

        while (true) {
            $chunk = fread($pipes[2], self::BUFFER_SIZE);
            if ($chunk !== false && strlen($chunk)) {
                $buffer .= $chunk;
                if (preg_match($pattern, $buffer, $matches)) {
                    $this->port = (int)$matches['port'];
                    break;
                }
            }

            if ((time() - $start) > $timeout) {
                proc_terminate($this->process);
                proc_close($this->process);
                throw new RuntimeException("Server did not start within {$timeout} seconds.");
            }

            usleep(self::POLLING_INTERVAL);
        }

        // kill process
        pcntl_async_signals(true);
        pcntl_signal(SIGINT, fn() => $this->down());
        pcntl_signal(SIGTERM, fn() => $this->down());


        $status = proc_get_status($this->process);
        $wrapper_pid = $status['pid'] ?? null;

        register_shutdown_function(function () use ($wrapper_pid) {
            if ($wrapper_pid && $wrapper_pid > 0) {
                $wrapper_pid = (int) $wrapper_pid; // Ensure it's an integer
                if (stripos(PHP_OS_FAMILY, 'Windows') !== false) {
                    $command = sprintf('taskkill /F /T /PID %d >nul 2>&1', $wrapper_pid);
                    exec($command);
                } else {
                    $command = sprintf('ps -p %d', $wrapper_pid);
                    exec($command, $output, $code);

                    if ($code === 0) {
                        exec(sprintf('pgrep -P %d', $wrapper_pid), $child_pids);
                        foreach ($child_pids as $pid) {
                            if ($pid && $pid > 0) {
                                $pid = (int) $pid;
                                exec(sprintf('kill -9 %d > /dev/null 2>&1', $pid));
                            }
                        }

                        exec(sprintf('kill -9 %d > /dev/null 2>&1', $wrapper_pid));
                    }
                }
            }
        });

        return $this;
    }

    /**
     * Adds a standard route to the Bypass server.
     *
     * @param string $method HTTP method (GET, POST, PUT, PATCH, DELETE, HEAD, OPTIONS).
     * @param string $uri URI path for the route (e.g., '/v1/users').
     * @param int $status HTTP status code to return (100-599). Default: 200.
     * @param string|array|null $body Response body. If array, will be JSON encoded. Default: null.
     * @param int $times Number of times this route should be callable. Default: 1.
     * @param array<string, string|string[]> $headers HTTP headers to return. Default: [].
     * @return self
     * @throws RuntimeException If method, status code, or URI is invalid.
     */
    public function addRoute(
        string $method,
        string $uri,
        int $status = 200,
        null|string|array $body = null,
        int $times = 1,
        array $headers = []
    ): self {
        $method = strtoupper(trim($method));
        if (!in_array($method, self::VALID_HTTP_METHODS, true)) {
            $validMethods = implode(', ', self::VALID_HTTP_METHODS);
            throw new RuntimeException(
                "Invalid HTTP method: {$method}. Valid methods are: {$validMethods}"
            );
        }

        if (empty(trim($uri))) {
            throw new RuntimeException('URI cannot be empty.');
        }

        if ($status < self::MIN_STATUS_CODE || $status > self::MAX_STATUS_CODE) {
            $minStatus = self::MIN_STATUS_CODE;
            $maxStatus = self::MAX_STATUS_CODE;
            throw new RuntimeException(
                "Invalid HTTP status code: {$status}. Status code must be between {$minStatus} and {$maxStatus}."
            );
        }

        $body = is_array($body) ? json_encode($body) : $body;

        $this->registerRoute(new Route(
            method: $method,
            uri: $uri,
            body: $body,
            status: $status,
            times: $times,
            headers: $headers,
        ));

        return $this;
    }

    /**
     * Adds a file route to the Bypass server that returns binary file content.
     *
     * @param string $method HTTP method (GET, POST, PUT, PATCH, DELETE, HEAD, OPTIONS).
     * @param string $uri URI path for the route (e.g., '/v1/file.pdf').
     * @param int $status HTTP status code to return (100-599). Default: 200.
     * @param string|null $file Binary file content to return. Default: null.
     * @param int $times Number of times this route should be callable. Default: 1.
     * @param array<string, string|string[]> $headers HTTP headers to return. Default: [].
     * @return self
     * @throws RuntimeException If method, status code, URI, or file is invalid.
     */
    public function addFileRoute(
        string $method,
        string $uri,
        int $status = 200,
        ?string $file = null,
        int $times = 1,
        array $headers = []
    ): self {
        $method = strtoupper(trim($method));
        if (!in_array($method, self::VALID_HTTP_METHODS, true)) {
            $validMethods = implode(', ', self::VALID_HTTP_METHODS);
            throw new RuntimeException(
                "Invalid HTTP method: {$method}. Valid methods are: {$validMethods}"
            );
        }

        if (empty(trim($uri))) {
            throw new RuntimeException('URI cannot be empty.');
        }

        if ($status < self::MIN_STATUS_CODE || $status > self::MAX_STATUS_CODE) {
            $minStatus = self::MIN_STATUS_CODE;
            $maxStatus = self::MAX_STATUS_CODE;
            throw new RuntimeException(
                "Invalid HTTP status code: {$status}. Status code must be between {$minStatus} and {$maxStatus}."
            );
        }

        if ($file === null || $file === '') {
            throw new RuntimeException('File content cannot be empty.');
        }

        $this->registerRoute(new RouteFile(
            method: $method,
            uri: $uri,
            file: $file,
            status: $status,
            times: $times,
            headers: $headers,
        ));

        return $this;
    }

    /**
     * Gets all registered routes.
     *
     * @return array<int, array<string, mixed>> Array of route configurations.
     */
    public function getRoutes(): array
    {
        return array_map(function (Route | RouteFile $route) {
            return $route->toArray();
        }, $this->routes);
    }

    /**
     * Asserts that all registered routes were called the expected number of times.
     *
     * @return void
     * @throws RouteNotCalledException If any route was not called the expected number of times.
     */
    public function assertRoutes(): void
    {
        $url = $this->getBaseUrl(self::API_ROUTER_PATH);
        foreach ($this->routes as $route) {
            $uri = $route->uri;
            $method = $route->method;
            $path = "{$url}?route={$uri}&method={$method}";
            $response = \file_get_contents($path);
            $currentTimes = \json_decode($response, true);
            $expectedTimes = $route->times;
            if ($currentTimes === $expectedTimes) {
                continue;
            }

            throw new RouteNotCalledException(
                "Bypass expected route '{$uri}' with method '{$method}' to be called {$expectedTimes} times(s). "
                . "Found {$currentTimes} calls(s) instead."
            );
        }
    }

    /**
     * Alias for addRoute(). Adds a standard route to the Bypass server.
     *
     * @param string $method HTTP method (GET, POST, PUT, PATCH, DELETE, HEAD, OPTIONS).
     * @param string $uri URI path for the route (e.g., '/v1/users').
     * @param int $status HTTP status code to return (100-599). Default: 200.
     * @param string|array|null $body Response body. If array, will be JSON encoded. Default: null.
     * @param int $times Number of times this route should be callable. Default: 1.
     * @param array<string, string|string[]> $headers HTTP headers to return. Default: [].
     * @return self
     * @throws RuntimeException If method, status code, or URI is invalid.
     */
    public function expect(
        string $method,
        string $uri,
        int $status = 200,
        null|string|array $body = null,
        int $times = 1,
        array $headers = []
    ): self {
        return $this->addRoute($method, $uri, $status, $body, $times, $headers);
    }

    protected function registerRoute(Route|RouteFile $route): array
    {
        if (!$this->port || !$this->process) {
            $this->handle();
        }
        $url = $this->getBaseUrl(self::API_ROUTER_PATH);
        $this->routes[] = $route;
        $params = $route->toArray();
        if ($route instanceof RouteFile) {
            $params['file'] = base64_encode($params['file']);
        }
        $response = \file_get_contents(filename: $url, context: \stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => 'Content-Type: application/json',
                'content' => json_encode($params),
            ],
        ]));
        \preg_match('/^HTTP\/.* (\d{3})/', $http_response_header[0] ?? '', $matches);
        $status = $matches[1] ?? '';

        return [
            'body' => $response,
            'status' => $status,
        ];
    }

    /**
     * Returns the base URL of the Bypass server as a string.
     *
     * @return string The base URL (e.g., "http://localhost:8080").
     */
    public function __toString()
    {
        return $this->getBaseUrl();
    }

    /**
     * Kills a process by its PID.
     *
     * @param int $pid Process ID to kill.
     * @return void
     */
    private function killPid(int $pid): void
    {
        // Validate PID is positive
        if ($pid <= 0) {
            return;
        }

        $pid = (int) $pid; // Ensure it's an integer

        if (stripos(PHP_OS_FAMILY, 'Windows') !== false) {
            $command = sprintf('taskkill /F /T /PID %d >nul 2>&1', $pid);
            exec($command, $output, $returnCode);
            if ($returnCode !== 0) {
                // Log or handle error if needed, but don't throw to avoid breaking cleanup
            }
        } else {
            $command = sprintf('kill -9 %d > /dev/null 2>&1', $pid);
            exec($command, $output, $returnCode);
            if ($returnCode !== 0) {
                // Log or handle error if needed, but don't throw to avoid breaking cleanup
            }
        }
    }
}
