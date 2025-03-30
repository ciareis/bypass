<?php

namespace Ciareis\Bypass;

class RouteFile
{
    /**
     * @param array<string, string|string[]> $headers
     */
    public function __construct(
        public string $method,
        public string $uri,
        public string $file,
        public int $status = 200,
        public int $times = 1,
        public array $headers = [],
    ) {
        if (!\str_starts_with($uri, '/')) {
            $this->uri = "/{$uri}";
        }
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}
