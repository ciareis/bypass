<?php

namespace Ciareis\Bypass;

class Route
{
    public function __construct(
        public string $method,
        public string $uri,
        public int $status,
        public ?string $body = null,
        public int $times = 1
    ) {
    }

    public static function ok(string $uri, ?string $body = null, string $method = "GET", int $times = 1)
    {
        return new static(method: $method, uri: $uri, body: $body, status: 200, times: $times);
    }

    public static function created(string $uri, ?string $body = null, int $times = 1)
    {
        return new static(method: "POST", uri: $uri, body: $body, status: 201, times: $times);
    }

    public static function badRequest(string $uri, ?string $body = null, string $method = 'POST', int $times = 1)
    {
        return new static(method: $method, uri: $uri, body: $body, status: 400, times: $times);
    }

    public static function validationFailed(string $uri, ?string $body = null, string $method = 'POST', int $times = 1)
    {
        return new static(method: $method, uri: $uri, body: $body, status: 422, times: $times);
    }

    public static function notFound(string $uri, ?string $body = null, string $method = 'GET', int $times = 1)
    {
        return new static(method: $method, uri: $uri, body: $body, status: 404, times: $times);
    }

    public static function serverError(string $uri, ?string $body = null, string $method = 'GET', int $times = 1)
    {
        return new static(method: $method, uri: $uri, body: $body, status: 500, times: $times);
    }

    public static function unauthorized(string $uri, ?string $body = null, string $method = 'GET', int $times = 1)
    {
        return new static(method: $method, uri: $uri, body: $body, status: 401, times: $times);
    }

    public static function forbidden(string $uri, ?string $body = null, string $method = 'GET', int $times = 1)
    {
        return new static(method: $method, uri: $uri, body: $body, status: 403, times: $times);
    }

    public static function delete(string $uri, ?string $body = null, int $status = 200, int $times = 1)
    {
        return new static(method: "DELETE", uri: $uri, body: $body, status: $status, times: $times);
    }

    public static function get()
    {
    }

    public static function post()
    {
    }

    public static function put()
    {
    }

    public static function patch()
    {
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}
