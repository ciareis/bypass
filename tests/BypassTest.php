<?php

declare(strict_types=1);

namespace Tests;

use Ciareis\Bypass\Bypass;
use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Http;

class HttpService
{
    public static function http($url)
    {
        $response = Http::get($url);

        return json_decode($response->body(), true);
    }
}

class BypassTest extends TestCase
{
    public function test_uri_faker(): void
    {
        // prepare
        $bypass = Bypass::open();

        $body = \json_encode([
            'content' => 'excepeted',
            'product' => [
                'id' => 1,
                'value' => 100
            ]
        ]);

        $path = '/url_faker';

        $bypass->expect(method: 'get', uri: $path, status: 200, body: $body);

        // execute
        $url = $this->getUrl($bypass, $path);
        $response = HttpService::http($url);

        $data = json_encode($response);

        // asserts
        $this->assertTrue($data === $body);
        $this->assertArrayHasKey('content', $response);
        $this->assertArrayHasKey('product', $response);
    }

    protected function getUrl(Bypass $bypass, string $path = '/')
    {
        return "http://localhost:{$bypass->getPort()}{$path}";
    }
}
