<?php

use Ciareis\Bypass\Bypass;
use Ciareis\Bypass\Route;
use Ciareis\Bypass\RouteNotCalledException;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

it('returns bypass with Bypass::serve', function () {
    $bypass = Bypass::serve(
        Route::ok(uri: '/v1/user'),
        Route::forbidden(uri: '/v1/user/1/secrets')
    );

    expect($bypass)->toBeInstanceOf(Bypass::class);
    expect($bypass->getRoutes())->toHaveCount(2);
    expect($bypass->getPort())->toBeInt();
    expect((string) $bypass)->toEqual($bypass->getBaseUrl());
});

test('Route::ok returns 200 + body', function () {
    $uri = '/v1/user';

    $bypass = bypass::serve(
        Route::ok(uri: $uri, body: ['name' => 'Leandro Henrique'])
    );

    $response = Http::get($bypass . $uri);

    expect($response->json())->name->toBe('Leandro Henrique');
    expect($response->status())->toBeInt()->ToBe(200);
    expect($response->successful())->toBeTrue();

    $response->throw();
});

test('Route::created returns 201 + body', function () {
    $uri = '/v1/user';

    $bypass = bypass::serve(
        Route::created(uri: $uri, body: ['result' => 'User successfully created'])
    );

    $response = Http::post($bypass . $uri);

    expect($response->json())->result->toBe('User successfully created');

    expect($response->status())->toBeInt()->ToBe(201);
    expect($response->successful())->toBeTrue();

    $response->throw();
});

test('Route::badRequest returns 400 + body', function () {
    $uri = '/v1/users?filter=foo';

    $bypass = bypass::serve(
        Route::badRequest(uri: $uri, body: ['error' => 'Filter parameter foo does not exist.'], method: 'GET')
    );

    $response = Http::get($bypass . $uri);
    expect($response->json())
        ->error->toBe('Filter parameter foo does not exist.');

    $response->throw();
})->throws(RequestException::class, 'HTTP request returned status code 400');

test('Route::Unauthorized returns 401 + body', function () {
    $uri = '/v1/my-favorites';

    $bypass = bypass::serve(
        Route::Unauthorized(uri: $uri, body: ['error' => 'Unauthenticated'])
    );

    $response = Http::get($bypass . $uri);

    expect($response->json())->error->toBe('Unauthenticated');
    expect($response->failed())->toBeTrue();

    $response->throw();
})->throws(RequestException::class, 'HTTP request returned status code 401');


test('Route::forbidden returns 403', function () {
    $uri = '/v1/user/1';

    $bypass = bypass::serve(
        Route::forbidden(uri: $uri, body: ['email' => 'leandro.new@ciareis.com'], method: 'PATCH')
    );

    $response = Http::patch($bypass . $uri);

    expect($response->failed())->toBeTrue();

    $response->throw();
})->throws(RequestException::class, 'HTTP request returned status code 403');


test('Route::notFound returns 404', function () {
    $uri = '/v1/fruits';

    $bypass = bypass::serve(
        Route::notFound(uri: $uri)
    );

    $response = Http::get($bypass . $uri);

    expect($response->failed())->toBeTrue();

    $response->throw();
})->throws(RequestException::class, 'HTTP request returned status code 404');


test('Route::notAllowed returns 405', function () {
    $uri = '/update-user-with-get-method';

    $bypass = bypass::serve(
        Route::notAllowed(uri: $uri)
    );

    $response = Http::get($bypass . $uri);

    expect($response->failed())->toBeTrue();

    $response->throw();
})->throws(RequestException::class, 'HTTP request returned status code 405');

test('Route::serverError returns 500 + body', function () {
    $uri = '/v1/foobar';

    $bypass = bypass::serve(
        Route::serverError(uri: $uri)
    );

    $response = Http::get($bypass . $uri);

    expect($response->body())->toBeEmpty();
    expect($response->serverError())->toBeTrue();

    $response->throw();
})->throws(RequestException::class, 'HTTP request returned status code 500');

test('Route::validationFailed returns 422 + body', function () {
    $uri = '/v1/user';

    $bypass = bypass::serve(
        Route::validationFailed(uri: $uri, body: ['validation_error' => ['first_name' =>  [ 'Name must be at least 5 characters long.' ] ] ])
    );

    $request = Http::post($bypass . $uri);

    expect($request->body())->toBeJson();
    expect($request->json()['validation_error']['first_name'][0])->toBe('Name must be at least 5 characters long.');

    $request->throw();
})->throws(RequestException::class, 'HTTP request returned status code 422');

test("Bypass->assertRotues no called /v1/login when it is first argument", function () {
    $body = "teste";
    $bypass = Bypass::serve(
        Route::ok(uri: '/v1/phone/teste', body: $body),
        Route::notFound(uri: '/v1/login', body: ['fruta' => 'banana']),
    );

    $response = Http::get($bypass->getBaseUrl('/v1/phone/teste'));

    expect($response->body())->toEqual($body);

    $bypass->assertRoutes();
})->throws(RouteNotCalledException::class, "Bypass expected route '/v1/login' with method 'GET' to be called 1 times(s). Found 0 calls(s) instead.");

test("Bypass->assertRotues no called /v1/login when it is second argument", function () {
    $body = "teste";
    $bypass = Bypass::serve(
        Route::notFound(uri: '/v1/login', body: ['fruta' => 'banana']),
        Route::ok(uri: '/v1/phone/teste', body: $body),
    );

    $response = Http::get($bypass->getBaseUrl('/v1/phone/teste'));

    expect($response->body())->toEqual($body);

    $bypass->assertRoutes();
})->throws(RouteNotCalledException::class, "Bypass expected route '/v1/login' with method 'GET' to be called 1 times(s). Found 0 calls(s) instead.");

test("Bypass->assertRotues no called /v1/phone/teste when it is first argument", function () {
    $body = ['fruta' => 'banana'];
    $bypass = Bypass::serve(
        Route::ok(uri: '/v1/phone/teste', body: 'teste'),
        Route::notFound(uri: '/v1/login', body: $body),
    );

    $response = Http::get($bypass->getBaseUrl('/v1/login'));
    expect($response->json())->toHaveKeys(['fruta']);
    expect($response->json())->toEqual($body);

    $bypass->assertRoutes();
})->throws(RouteNotCalledException::class, "Bypass expected route '/v1/phone/teste' with method 'GET' to be called 1 times(s). Found 0 calls(s) instead.");

test("Bypass->assertRotues no called /v1/phone/teste when it is second argument", function () {
    $body = ['fruta' => 'banana'];
    $bypass = Bypass::serve(
        Route::notFound(uri: '/v1/login', body: $body),
        Route::ok(uri: '/v1/phone/teste', body: 'teste'),
    );

    $response = Http::get($bypass->getBaseUrl('/v1/login'));
    expect($response->json())->toHaveKeys(['fruta']);
    expect($response->json())->toEqual($body);

    $bypass->assertRoutes();
})->throws(RouteNotCalledException::class, "Bypass expected route '/v1/phone/teste' with method 'GET' to be called 1 times(s). Found 0 calls(s) instead.");

test("methods body, status, method", function () {
    // prepare
    $body = 'teste';
    $path = '/users/emtudo/repos';
    $bypass = Bypass::serve([
        Route::ok($path)
            ->body($body)
            ->status(404)
            ->method('post')
            ->times(2)
    ]);

    // asserts
    expect($bypass->getRoutes())->toMatchArray([
        [
            'method' => 'POST',
            'uri' => $path,
            'status' => 404,
            'body' => $body,
            'times' => 2,
            'headers' => [],
        ]
    ]);
});
