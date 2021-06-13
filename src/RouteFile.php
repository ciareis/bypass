<?php

namespace Ciareis\Bypass;

class RouteFile
{
    public function __construct(
        public string $method,
        public string $uri,
        public string $file,
        public int $status = 200,
        public int $times = 1
    ) {
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}
