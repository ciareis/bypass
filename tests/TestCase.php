<?php

namespace Tests;

use Ciareis\Bypass\BypassServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{

    protected function getPackageProviders($app): array
    {
        return [
            BypassServiceProvider::class
        ];
    }
}
