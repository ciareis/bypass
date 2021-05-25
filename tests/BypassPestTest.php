<?php

/*
|--------------------------------------------------------------------------
| Pest  example
|--------------------------------------------------------------------------
|
| You can see Bypass being used in test written with Pest PHP
|
*/

use Ciareis\Bypass\Bypass;
use Illuminate\Support\Facades\Http;
use Tests\Services\GithubRepoService;

it("total stargazers by user", function () {
    // prepare
    $bypass = Bypass::open();

    $body = \json_encode(getBody());

    $path = '/users/emtudo/repos';

    $bypass->expect(method: 'get', uri: $path, status: 200, body: $body);

    // execute
    $service = new GithubRepoService();
    $response = $service->setBaseUrl(getBaseUrl($bypass))
        ->getTotalStargazersByUser("emtudo", true);

    // asserts
    expect(16)->toBe($response);
});

it('returns server unavailable', function () {
    // prepare
    $bypass = Bypass::open();

    $path = '/users/emtudo/repos';

    $bypass->expect(method: 'get', uri: $path, status: 503);

    // execute
    $service = new GithubRepoService();
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
    $service = new GithubRepoService();
    $response = $service->setBaseUrl(getBaseUrl($bypass))
      ->getTotalStargazersByUser("emtudo");

    expect('Server down.')->toEqual($response);
});


it('returns route not found', function () {
    // prepare
    $bypass = Bypass::open();
    $bypass->expect(method: 'get', uri: '/no-route', status: 200);
    $bypass->stop();

    $response = Http::get(getBaseUrl($bypass, '/no-route'));

    expect(500)->toEqual($response->status());
    expect('Bypass route /no-route and method GET not found.')->toEqual($response->body());
});


it('returns exceptions when server down', function () {
    // prepare
    $bypass = Bypass::open();
    $bypass->down();

    Http::get(getBaseUrl($bypass, '/no-route'));
})->throws(Illuminate\Http\Client\ConnectionException::class);


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
