<?php

namespace Ciareis\Bypass;

use Exception;
use Illuminate\Support\Facades\Http;
use Symfony\Component\Process\Process;

class Bypass
{
    protected $started = false;
    protected $port;
    protected $process;
    protected $phpPath;

    public static function open(?int $port = null)
    {
        $process = new self();

        return $process->handle($port);
    }

    public function handle(?int $port = null)
    {
        while (!$this->started) {
            try {
                $this->startServer($port);
            } catch (Exception $e) {
                //
            }
        }

        return $this;
    }

    public function stop()
    {
        $url = $this->url("___api_faker_clear_router");

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

    public function getBaseUrl()
    {
        return "http://localhost:{$this->port}";
    }

    protected function startServer(?int $port = null)
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

                $this->started = true;
                $this->port = $matches['port'];

                return true;
            }
        );

        $this->stop();
    }

    public function addRoute(string $method, string $uri, int $status = 200, ?string $body = null)
    {
        return $this->addRouteParams($uri, [
            'method' => \strtoupper($method),
            'content' => $body,
            'status' => $status,
        ]);
    }

    public function addRouteFile(string $method, string $uri, int $status = 200, $file = null)
    {
        return $this->addRouteParams($uri, [
            'method' => \strtoupper($method),
            'file' => base64_encode($file),
            'status' => $status,
        ]);
    }

    // deprecated: It will remove at version v1.0.0
    public function expect(string $method, string $uri, int $status = 200, ?string $body = null)
    {
        return $this->addRoute($method, $uri, $status, $body);
    }

    private function addRouteParams(string $uri, array $params)
    {
        $url = $this->url("___api_faker_add_router");

        if (!\str_starts_with($uri, '/')) {
            $uri = "/{$uri}";
        }

        $params['uri'] = $uri;

        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])
            ->put($url, $params);

        return [
            'body' => $response->body(),
            'status' => $response->status(),
        ];
    }

    protected function url($path)
    {
        if (!str_starts_with($path, '/')) {
            $path = "/" . $path;
        }

        return "http://localhost:{$this->port}{$path}";
    }
}
