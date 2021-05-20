<?php

namespace Tests;

use Ciareis\Bypass\BypassServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{

    protected function getPackageProviders($app)
    {

        return [
            BypassServiceProvider::class
        ];
    }
}
