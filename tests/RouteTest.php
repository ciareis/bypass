<?php

use Ciareis\Bypass\Bypass;
use Ciareis\Bypass\Route;

it('returns headers with served route', function (
    string $routeFunction,
    string $httpFunction,
    int $expectedStatus,
) {
    $expectedBody = '';
    $params = [
        'uri' => '/test/1234',
        'headers' => [
            'X-Test' => 'test header',
            'X-Test2' => ['first', 'second', 'third'],
        ],
    ];

    if (in_array($routeFunction, ['getFile', 'file'])) {
        $expectedBody = file_get_contents('docs/img/logo.png');
        $params['file'] = $expectedBody;
    }

    $route = Route::$routeFunction(...$params);
    $bypass = Bypass::serve($route);
    $response = Http::$httpFunction($bypass->getBaseUrl('/test/1234'));

    expect($route->method)->toEqual(strtoupper($httpFunction))
        ->and($response->status())->toEqual($expectedStatus)
        ->and($response->body())->toEqual($expectedBody)
        ->and($response->getHeaderLine('X-Test'))->toEqual('test header')
        ->and($response->getHeaderLine('X-Test2'))->toEqual('first, second, third');
})->with([
    ['ok', 'get', 200],
    ['badRequest', 'post', 400],
    ['unauthorized', 'get', 401],
    ['forbidden', 'get', 403],
    ['created', 'post', 201],
    ['notFound', 'get', 404],
    ['notAllowed', 'get', 405],
    ['tooMany', 'get', 429],
    ['serverError', 'get', 500],
    ['validationFailed', 'post', 422],
    ['get', 'get', 200],
    ['post', 'post', 200],
    ['put', 'put', 200],
    ['delete', 'delete', 204],
    ['patch', 'patch', 200],
    ['file', 'get', 200],
    ['getFile', 'get', 200],
]);
