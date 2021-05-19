<?php

declare(strict_types=1);

namespace Tests;

use Ciareis\Bypass\Bypass;
use Exception;
use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Http;

class GithubRepoService
{
    protected $baseUrl = "https://api.github.com";

    public function setBaseUrl(string $url)
    {
        $this->baseUrl = $url;

        return $this;
    }

    public function getTotalStargazersByUser(string $username, bool $dd = false)
    {
        $url = "{$this->baseUrl}/users/${username}/repos";

        try {
            $response = Http::get($url);
        } catch (Exception $e) {
            return "Server down.";
        }

        if ($response->status() === 503) {
            return "Server unavailable.";
        }

        return collect($response->json())
            ->sum('stargazers_count');
    }
}

class BypassTest extends TestCase
{
    public function test_total_stargazers_by_user(): void
    {
        // prepare
        $bypass = Bypass::open();

        $body = \json_encode($this->getBody());

        $path = '/users/emtudo/repos';

        $bypass->expect(method: 'get', uri: $path, status: 201, body: $body);

        // execute
        $service = new GithubRepoService();
        $response = $service->setBaseUrl($this->getBaseUrl($bypass))
            ->getTotalStargazersByUser("emtudo", true);

        // asserts
        $this->assertEquals(16, $response);
    }

    public function test_server_unavailable(): void
    {
        // prepare
        $bypass = Bypass::open();

        $path = '/users/emtudo/repos';

        $bypass->expect(method: 'get', uri: $path, status: 503);

        // execute
        $service = new GithubRepoService();
        $response = $service->setBaseUrl($this->getBaseUrl($bypass))
            ->getTotalStargazersByUser("emtudo");

        // asserts
        $this->assertTrue($response === 'Server unavailable.');
    }

    public function test_server_down(): void
    {
        // prepare
        $bypass = Bypass::open();

        $path = '/users/emtudo/repos';

        $bypass->expect(method: 'get', uri: $path, status: 503);
        $bypass->down();

        // execute
        $service = new GithubRepoService();
        $response = $service->setBaseUrl($this->getBaseUrl($bypass))
            ->getTotalStargazersByUser("emtudo");

        // asserts
        $this->assertTrue($response === 'Server down.');
    }

    protected function getBaseUrl(Bypass $bypass, $path = null)
    {
        return "http://localhost:{$bypass->getPort()}{$path}";
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
