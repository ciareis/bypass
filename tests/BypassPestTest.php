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
    $response = $service->setBaseUrl($bypass->getBaseUrl())
        ->getTotalStargazersByUser("emtudo", true);

    // asserts
    expect($response)->toBe(16);
});

it('returns server unavailable', function () {
    // prepare
    $bypass = Bypass::open();

    $path = '/users/emtudo/repos';

    $bypass->expect(method: 'get', uri: $path, status: 503);

    // execute
    $service = new GithubRepoService();
    $response = $service->setBaseUrl($bypass->getBaseUrl())
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
    $response = $service->setBaseUrl($bypass->getBaseUrl())
      ->getTotalStargazersByUser("emtudo");

    expect($response)->toEqual('Server down.');
});


it('returns route not found', function () {
    // prepare
    $bypass = Bypass::open();
    $bypass->expect(method: 'get', uri: '/no-route', status: 200);
    $bypass->stop();

    $response = Http::get($bypass->getBaseUrl() . '/no-route');

    expect($response->status())->toEqual(500);
    expect('Bypass route /no-route and method GET not found.')->toEqual($response->body());
});


it('returns exceptions when server down', function () {
    // prepare
    $bypass = Bypass::open();
    $bypass->down();

    Http::get($bypass->getBaseUrl() . '/no-route');
})->throws(Illuminate\Http\Client\ConnectionException::class);

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
