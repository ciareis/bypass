<?php

/*
|--------------------------------------------------------------------------
| PHPUnit test example
|--------------------------------------------------------------------------
|
| You can see Bypass being used in a PHPUnit test
|
*/

declare(strict_types=1);

namespace Tests;

use Ciareis\Bypass\Bypass;
use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Http;
use Tests\Services\GithubRepoService;

class BypassTest extends TestCase
{
    public function test_total_stargazers_by_user(): void
    {
        // prepare
        $bypass = Bypass::open();

        $body = \json_encode($this->getBody());

        $path = '/users/emtudo/repos';

        $bypass->expect(method: 'get', uri: $path, status: 200, body: $body);

        // execute
        $service = new GithubRepoService();
        $response = $service->setBaseUrl($bypass->getBaseUrl())
            ->getTotalStargazersByUser("emtudo", true);

        // asserts
        $this->assertSame(16, $response);
    }

    public function test_returns_server_unavailable(): void
    {
        // prepare
        $bypass = Bypass::open();

        $path = '/users/emtudo/repos';

        $bypass->expect(method: 'get', uri: $path, status: 503);

        // execute
        $service = new GithubRepoService();
        $response = $service->setBaseUrl($bypass->getBaseUrl())
            ->getTotalStargazersByUser("emtudo");

        // asserts
        $this->assertSame($response, 'Server unavailable.');
    }

    public function test_returns_server_down(): void
    {
        // prepare
        $bypass = Bypass::open();
        $path = '/users/emtudo/repos';
        $bypass->expect(method: 'get', uri: $path, status: 503);
        $bypass->down();

        // execute
        $service = new GithubRepoService();
        $response = $service->setBaseUrl($bypass->getBaseUrl())
            ->getTotalStargazersByUser("emtudo");

        // asserts
        $this->assertSame($response, 'Server down.');
    }

    public function test_returns_route_not_found(): void
    {
        $bypass = Bypass::open();
        $bypass->expect(method: 'get', uri: '/no-route', status: 200);
        $bypass->stop();

        $response = Http::get($bypass->getBaseUrl() . '/no-route');

        $this->assertSame(500, $response->status());
        $this->assertSame('Bypass route /no-route and method GET not found.', $response->body());
    }

    public function test_returns_exceptions_when_server_down(): void
    {
        $bypass = Bypass::open();
        $bypass->down();

        $this->expectException(\Illuminate\Http\Client\ConnectionException::class);

        Http::get($bypass->getBaseUrl() . '/no-route');
    }

    protected function getBody()
    {
        return [
            [
                "stargazers_count" => 0
            ],
            [
                "stargazers_count" => 3
            ],
            [
                "stargazers_count" => 0,
            ],
            [
                "stargazers_count" => 1,
            ],
            [
                "stargazers_count" => 0,
            ],
            [
                "stargazers_count" => 0,
            ],
            [
                "stargazers_count" => 0,
            ],
            [
                "stargazers_count" => 0,
            ],
            [
                "stargazers_count" => 1,
            ],
            [
                "stargazers_count" => 0,
            ],
            [
                "stargazers_count" => 0,
            ],
            [
                "stargazers_count" => 0,
            ],
            [
                "stargazers_count" => 0,
            ],
            [
                "stargazers_count" => 1,
            ],
            [
                "stargazers_count" => 0,
            ],
            [
                "stargazers_count" => 2,
            ],
            [
                "stargazers_count" => 0,
            ],
            [
                "stargazers_count" => 0,
            ],
            [
                "stargazers_count" => 0,
            ],
            [
                "stargazers_count" => 4,
            ],
            [
                "stargazers_count" => 1,
            ],
            [
                "stargazers_count" => 0,
            ],
            [
                "stargazers_count" => 0,
            ],
            [
                "stargazers_count" => 1,
            ],
            [
                "stargazers_count" => 2,
            ],
            [
                "stargazers_count" => 0,
            ],
            [
                "stargazers_count" => 0,
            ],
            [
                "stargazers_count" => 0,
            ],
            [
                "stargazers_count" => 0,
            ],
            [
                "stargazers_count" => 0,
            ],
        ];
    }
}
