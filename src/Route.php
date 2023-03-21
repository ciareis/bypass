<?php

namespace Ciareis\Bypass;

class Route
{
    public function __construct(
        public string $method,
        public string $uri,
        public int $status,
        public null|string|array $body = null,
        public int $times = 1
    ) {
    }

    public function body(
        null|string|array $body = null
    ) {
        $this->body = $body;

        return $this;
    }
    
    public function method(
        string $method
    ) {
        $this->method = mb_strtoupper($method);

        return $this;
    }

    public function status(int $status)
    {
        $this->status = $status;

        return $this;
    }

    public function times(int $times = 1)
    {
        $this->times = $times;

        return $this;
    }

    public static function ok(
        string $uri,
        null|string|array $body = null,
        string $method = "GET",
        int $times = 1
    ) {
        return new static(
            method: $method,
            uri: $uri,
            body: $body,
            status: 200,
            times: $times
        );
    }

    public static function badRequest(
        string $uri,
        null|string|array $body = null,
        string $method = 'POST',
        int $times = 1
    ) {
        return new static(
            method: $method,
            uri: $uri,
            body: $body,
            status: 400,
            times: $times
        );
    }

    public static function unauthorized(
        string $uri,
        null|string|array $body = null,
        string $method = 'GET',
        int $times = 1
    ) {
        return new static(
            method: $method,
            uri: $uri,
            body: $body,
            status: 401,
            times: $times
        );
    }

    public static function forbidden(
        string $uri,
        null|string|array $body = null,
        string $method = 'GET',
        int $times = 1
    ) {
        return new static(
            method: $method,
            uri: $uri,
            body: $body,
            status: 403,
            times: $times
        );
    }

    public static function created(
        string $uri,
        null|string|array $body = null,
        int $times = 1
    ) {
        return new static(
            method: "POST",
            uri: $uri,
            body: $body,
            status: 201,
            times: $times
        );
    }

    public static function notFound(
        string $uri,
        null|string|array $body = null,
        string $method = 'GET',
        int $times = 1
    ) {
        return new static(
            method: $method,
            uri: $uri,
            body: $body,
            status: 404,
            times: $times
        );
    }

    public static function notAllowed(
        string $uri,
        null|string|array $body = null,
        string $method = 'GET',
        int $times = 1
    ) {
        return new static(
            method: $method,
            uri: $uri,
            body: $body,
            status: 405,
            times: $times
        );
    }

    public static function tooMany(
        string $uri,
        null|string|array $body = null,
        string $method = 'GET',
        int $times = 1
    ) {
        return new static(
            method: $method,
            uri: $uri,
            body: $body,
            status: 429,
            times: $times
        );
    }

    public static function serverError(
        string $uri,
        null|string|array $body = null,
        string $method = 'GET',
        int $times = 1
    ) {
        return new static(
            method: $method,
            uri: $uri,
            body: $body,
            status: 500,
            times: $times
        );
    }

    public static function validationFailed(
        string $uri,
        null|string|array $body = null,
        string $method = 'POST',
        int $times = 1
    ) {
        return new static(
            method: $method,
            uri: $uri,
            body: $body,
            status: 422,
            times: $times
        );
    }

    public static function file(
        string $uri,
        string $file,
        string $method = 'GET',
        int $status = 200,
        int $times = 1
    ) {
        return new RouteFile(
            method: $method,
            uri: $uri,
            file: $file,
            status: $status,
            times: $times
        );
    }

    public static function get(
        string $uri,
        null|string|array $body = null,
        int $status = 200,
        int $times = 1
    ) {
        return new static(
            method: "GET",
            uri: $uri,
            body: $body,
            status: $status,
            times: $times
        );
    }

    public static function getFile(
        string $uri,
        string $file,
        int $status = 200,
        int $times = 1
    ) {
        return new RouteFile(
            method: "GET",
            uri: $uri,
            file: $file,
            status: $status,
            times: $times
        );
    }

    public static function post(
        string $uri,
        null|string|array $body = null,
        int $status = 200,
        int $times = 1
    ) {
        return new static(
            method: "POST",
            uri: $uri,
            body: $body,
            status: $status,
            times: $times
        );
    }

    public static function put(
        string $uri,
        null|string|array $body = null,
        int $status = 200,
        int $times = 1
    ) {
        return new static(
            method: "PUT",
            uri: $uri,
            body: $body,
            status: $status,
            times: $times
        );
    }

    public static function delete(
        string $uri,
        null|string|array $body = null,
        int $status = 204,
        int $times = 1
    ) {
        return new static(
            method: "DELETE",
            uri: $uri,
            body: $body,
            status: $status,
            times: $times
        );
    }

    public static function patch(
        string $uri,
        null|string|array $body = null,
        int $status = 200,
        int $times = 1
    ) {
        return new static(
            method: "PATCH",
            uri: $uri,
            body: $body,
            status: $status,
            times: $times
        );
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}
