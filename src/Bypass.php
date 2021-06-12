<?php

namespace Ciareis\Bypass;

use Illuminate\Support\Facades\Http;
use Symfony\Component\Process\Process;

class Bypass
{
    protected $port;
    protected $process;
    protected $routes = [];

    public static function open(?int $port = null)
    {
        $process = new self();

        return $process->handle($port);
    }

    public function stop()
    {
        $url = $this->getBaseUrl("___api_faker_clear_router");

        Http::withHeaders([
            'Content-Type' => 'application/json'
        ])
            ->put($url, []);
    }

    public function down()
    {
        if ($this->process) {
            $this->process->stop();
        }

        return $this;
    }

    public function getPort()
    {
        return $this->port;
    }

    public function getBaseUrl(?string $path = null)
    {
        if ($path && !str_starts_with($path, '/')) {
            $path = "/" . $path;
        }

        return "http://localhost:{$this->port}{$path}";
    }

    public function handle(?int $port = null)
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

    public function addRoute(string $method, string $uri, int $status = 200, string|array $body = null, int $times = 1)
    {
        $body = is_array($body) ? json_encode($body) : $body;

        return $this->addRouteParams($uri, [
            'method' => \strtoupper($method),
            'content' => $body,
            'status' => $status,
        ], $times);
    }

    public function addFileRoute(string $method, string $uri, int $status = 200, string $file = null, int $times = 1)
    {
        return $this->addRouteParams($uri, [
            'method' => \strtoupper($method),
            'file' => base64_encode($file),
            'status' => $status,
        ], $times);
    }

    public function assertRoutes()
    {
        $url = $this->getBaseUrl("___api_faker_router_index");
        $routes = [];
        foreach ($this->routes as $route) {
            $uri = $route['uri'];
            $method = $route['method'];
            $path = "{$url}?route={$uri}&method={$method}";

            $response = Http::get($path);

            $routes[$route['uri']] = $response->body();

            if ($response->json() !== $route['times'] + 1) {
                throw new RouteNotCalledException("Route {$uri} and method {$method}");
            }
        }
    }

    // @todo deprecated: It will remove at version v1.0.0
    public function expect(string $method, string $uri, int $status = 200, string|array $body = null, $times = 1)
    {
        return $this->addRoute($method, $uri, $status, $body, $times);
    }

    private function addRouteParams(string $uri, array $params, int $times = 1)
    {
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
}
