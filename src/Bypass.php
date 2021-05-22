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
    }

    public function getPort()
    {
        return $this->port;
    }

    protected function startServer(?int $port = null)
    {
        $port = $port ?: rand(2048, 60000);

        $params = [PHP_BINARY, '-S', "localhost:{$port}",  __DIR__ . DIRECTORY_SEPARATOR . 'server.php'];

        $this->process = new Process($params);
        $this->process->start();

        // ... do other things

        // waits until the given anonymous function returns true
        $this->process->waitUntil(
            function ($type, $output) use ($port) {
                $pattern = "/started/";

                if (!preg_match($pattern, $output)) {
                    return false;
                }
                $this->started = true;
                $this->port = $port;

                return true;
            }
        );

        $this->stop();
    }

    public function expect(string $method, string $uri, int $status = 200, ?string $body = null)
    {
        $url = $this->url("___api_faker_add_router");

        if (!\str_starts_with($uri, '/')) {
            $uri = "/{$uri}";
        }

        $params = [
            'method' => \strtoupper($method),
            'uri' => $uri,
            'content' => $body,
            'status' => $status,
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

    protected function url($path)
    {
        if (!str_starts_with($path, '/')) {
            $path = "/" . $path;
        }

        return "http://localhost:{$this->port}{$path}";
    }
}
