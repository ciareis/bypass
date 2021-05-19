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

    public static function open(?int $port = null, string $node = 'node')
    {
        $process = new self();

        return $process->handle($port, $node);
    }

    public function handle(?int $port = null, string $node = 'node')
    {
        while (!$this->started) {
            try {
                $this->startServer($port, $node);
            } catch (Exception $e) {
            }
        }

        return $this;
    }

    public function getPort()
    {
        return $this->port;
    }

    protected function startServer(?int $port = null, string $node)
    {
        $port = $port ?: rand(2048, 65535);

        $params = [$node, __DIR__ . DIRECTORY_SEPARATOR . 'server.js', $port];

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
    }

    public function expect(string $method, string $uri, int $status = 200, ?string $content = null)
    {
        $path = $this->url("___start___faker___api");

        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])
            ->post($path, [
                'method' => \strtolower($method),
                'uri' => $uri,
                'content' => $content,
                'status' => $status,
            ]);

        return [
            'body' => $response->body(),
            'status' => $response->status(),
            'http' => $this->url("/start"),
        ];
    }

    public function testStatus()
    {
        $this->expect("GET", "/start", 200, "resposta qualquer");

        $path = $this->url("/start");

        $response = Http::get($path);

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
