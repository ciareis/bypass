<?php

namespace Ciareis\Bypass;

use Illuminate\Support\Facades\Http;
use Symfony\Component\Process\Process;

class Bypass
{
    protected $port;
    protected $process;
    protected $routes = [];

    public static function open(?int $port = null): self
    {
        $process = new self();

        return $process->handle($port);
    }

    public static function up(?int $port = null): self
    {
        return static::open($port);
    }

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

    public function stop(): self
    {
        $url = $this->getBaseUrl("___api_faker_clear_router");

        Http::withHeaders([
            'Content-Type' => 'application/json'
        ])
        ->put($url, []);

        return $this;
    }

    public function down(): self
    {
        if ($this->process) {
            $this->process->stop();
            $this->process = null;
        }

        return $this;
    }

    public function getPort(): int
    {
        return $this->port;
    }

    public function getBaseUrl(?string $path = null): string
    {
        if ($path && !str_starts_with($path, '/')) {
            $path = "/" . $path;
        }

        return "http://localhost:{$this->port}{$path}";
    }

    public function handle(?int $port = null): self
    {
        $params = [PHP_BINARY, '-S', "localhost:{$port}",  __DIR__ . DIRECTORY_SEPARATOR . 'server.php'];

        $this->process = new Process($params);
        $this->process->start();

        // waits until the given anonymous function returns true
        $this->process->waitUntil(
            function ($type, $output) {
                $pattern = '/\(.*?localhost:(?<port>\d+)\) started/';

                $matches = [];

                if (!preg_match($pattern, $output, $matches)) {
                    return false;
                }

                $this->port = $matches['port'];

                return true;
            }
        );

        $this->stop();

        return $this;
    }

    public function addRoute(string $method, string $uri, int $status = 200, null|string|array $body = null, int $times = 1): self
    {
        $body = is_array($body) ? json_encode($body) : $body;

        $this->addRouteParams($uri, [
            'method' => \strtoupper($method),
            'content' => $body,
            'status' => $status,
        ], $times);

        return $this;
    }

    public function addFileRoute(string $method, string $uri, int $status = 200, string $file = null, int $times = 1): self
    {
        $this->addRouteParams($uri, [
            'method' => \strtoupper($method),
            'file' => base64_encode($file),
            'status' => $status,
        ], $times);

        return $this;
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }

    public function assertRoutes(): void
    {
        $url = $this->getBaseUrl("___api_faker_router_index");
        $routes = [];
        foreach ($this->routes as $route) {
            $uri = $route['uri'];
            $method = $route['method'];
            $path = "{$url}?route={$uri}&method={$method}";

            $response = Http::get($path);

            $routes[$route['uri']] = $response->body();

            $currentTimes = $response->json();
            $expectedTimes = $route['times'];
            if ($currentTimes === $expectedTimes) {
                continue;
            }

            throw new RouteNotCalledException("Bypass expected route '{$uri}' with method '{$method}' to be called {$expectedTimes} times(s). Found {$currentTimes} calls(s) instead.");
        }
    }

    public function expect(string $method, string $uri, int $status = 200, null|string|array $body = null, int $times = 1): self
    {
        return $this->addRoute($method, $uri, $status, $body, $times);
    }

    protected function addRouteParams(string $uri, array $params, int $times = 1): array
    {
        if (!$this->port || !$this->process) {
            $this->handle();
        }
        $url = $this->getBaseUrl("___api_faker_add_router");

        if (!\str_starts_with($uri, '/')) {
            $uri = "/{$uri}";
        }

        $params['uri'] = $uri;

        $this->routes[] = [
            'uri' => $uri,
            'method' => $params['method'],
            'times' => $times,
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])
        ->put($url, $params);

        return [
            'body' => $response->body(),
            'status' => $response->status(),
        ];
    }

    public function __toString()
    {
        return $this->getBaseUrl();
    }
}
