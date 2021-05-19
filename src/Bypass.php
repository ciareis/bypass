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

    public static function open(?int $port = null, string $phpPath = 'php')
    {
        $process = new self();

        return $process->handle($port, $phpPath);
    }

    public function handle(?int $port = null, string $phpPath = 'php')
    {
        $process = new Process(['which', $phpPath]);
        $process->run();

        $exists = $process->getOutput();

        if (!$exists) {
            throw new Exception("Php not found. Define path please");
        }

        while (!$this->started) {
            try {
                $this->startServer($port, $phpPath);
            } catch (Exception $e) {
            }
        }

        return $this;
    }

    public function getPort()
    {
        return $this->port;
    }

    protected function startServer(?int $port = null, string $phpPath)
    {
        $port = $port ?: rand(2048, 60000);

        $params = [$phpPath, '-S', "localhost:{$port}",  __DIR__ . DIRECTORY_SEPARATOR . 'server.php'];

        $this->process = new Process($params);
        $this->process->start();

        // ... do other things

        // waits until the given anonymous function returns true
        $this->process->waitUntil(
            function ($type, $output) use ($port) {
                $pattern = "/started/";

                if (preg_match($pattern, $output)) {
                    $this->started = true;
                    $this->port = $port;

                    return true;
                }
                return false;
            }
        );

        Http::withHeaders([
            'Content-Type' => 'application/json'
        ])
            ->post('___api_faker_clear_router', []);
    }

    public function expect(string $method, string $uri, int $status = 200, ?string $body = null)
    {
        $path = $this->url("___api_faker_add_router");

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
            ->put($path, $params);

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
