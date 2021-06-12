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
use Tests\Services\LogoService;

it("total stargazers by user", function ($body) {
    // prepare
    $bypass = Bypass::open();
    $path = '/users/emtudo/repos';

    $bypass->expect(method: 'get', uri: $path, status: 200, body: $body);

    // execute
    $service = new GithubRepoService();
    $response = $service->setBaseUrl($bypass->getBaseUrl())
        ->getTotalStargazersByUser("emtudo", true);

    // asserts
    expect($response)->toBe(16);
})->with([
    json_encode(getBody()),
    [getBody()]
])->only();

it('returns route not called exception', function () {
    // prepare
    $bypass = Bypass::open();

    $path = '/users/emtudo/repos';

    $bypass->expect(method: 'get', uri: $path, status: 503);
    $bypass->assertRoutes();
})->throws(\Ciareis\Bypass\RouteNotCalledException::class);


it('returns server unavailable', function () {
    // prepare
    $bypass = Bypass::open();

    $path = '/users/emtudo/repos';

    $bypass->expect(method: 'get', uri: $path, status: 503);

    // execute
    $service = new GithubRepoService();
    $response = $service->setBaseUrl($bypass->getBaseUrl())
      ->getTotalStargazersByUser("emtudo");

    expect($response)->toEqual('Server unavailable.');
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
    expect($response->body())->toEqual('Bypass route /no-route and method GET not found.');
});

it("properly gets the logo", function () {
    // prepare
    $bypass = Bypass::open();

    $path = 'docs/img/logo.png';

    $file = file_get_contents("docs/img/logo.png");
    $bypass->addFileRoute(method: 'get', uri: $path, status: 200, file: $file);

    // execute
    $service = new LogoService();
    $response = $service->setBaseUrl($bypass->getBaseUrl())->getLogo();

    // asserts
    expect($response)->toEqual($file);
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
