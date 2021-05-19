<?php

use Ciareis\Bypass\Bypass;
use Illuminate\Support\Facades\Http;

test('total stargazers with user', function () {
    // prepare
    $bypass = Bypass::open();

    $body = \json_encode(getBody());

    $path = '/users/emtudo/repos';

    $bypass->expect(method: 'get', uri: $path, status: 200, body: $body);

    // execute
    $service = new GithubRepoPhpPestService();
    $response = $service->setBaseUrl(getBaseUrl($bypass))
        ->getTotalStargazersByUser("emtudo");

    expect(16)->toEqual($response);
});

test('server unavailabel', function () {
    // prepare
    $bypass = Bypass::open();

    $path = '/users/emtudo/repos';

    $bypass->expect(method: 'get', uri: $path, status: 500);

    // execute
    $service = new GithubRepoPhpPestService();
    $response = $service->setBaseUrl(getBaseUrl($bypass))
      ->getTotalStargazersByUser("emtudo");

    expect('Server unavailable.')->toEqual($response);
});

// Service

class GithubRepoPhpPestService
{
    protected $baseUrl = "https://api.github.com";

    public function setBaseUrl(string $url)
    {
        $this->baseUrl = $url;

        return $this;
    }

    public function getTotalStargazersByUser(string $username)
    {
        $url = "{$this->baseUrl}/users/${username}/repos";

        $response = Http::get($url);

        if ($response->status() === 500) {
            return "Server unavailable.";
        }

        return collect($response->json())
            ->sum('stargazers_count');
    }
}


// helpers
function getBaseUrl(Bypass $bypass, $path = null)
{
    return "http://localhost:{$bypass->getPort()}{$path}";
}

function getBody()
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
