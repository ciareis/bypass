<?php

use Ciareis\Bypass\Bypass;
use Tests\Service\GithubRepoPhpPestService;

it('properly totalizes stargazers with user', function () {
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

it('returns server unavailable', function () {
    // prepare
    $bypass = Bypass::open();

    $path = '/users/emtudo/repos';

    $bypass->expect(method: 'get', uri: $path, status: 503);

    // execute
    $service = new GithubRepoPhpPestService();
    $response = $service->setBaseUrl(getBaseUrl($bypass))
      ->getTotalStargazersByUser("emtudo");

    expect('Server unavailable.')->toEqual($response);
});

it('returns server down', function () {
    // prepare
    $bypass = Bypass::open();

    $path = '/users/emtudo/repos';

    $bypass->expect(method: 'get', uri: $path, status: 503);
    $bypass->down();

    // execute
    $service = new GithubRepoPhpPestService();
    $response = $service->setBaseUrl(getBaseUrl($bypass))
      ->getTotalStargazersByUser("emtudo");

    expect('Server down.')->toEqual($response);
});



// Helpers

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
