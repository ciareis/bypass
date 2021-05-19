<?php

namespace Ciareis\Bypass;

use Illuminate\Support\ServiceProvider;

class BypassServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
    }

    public function register()
    {
        $this->app->bind(Bypass::class, function ($app) {
            $php = $app['config']['bypass']['php'];

            return Bypass::open(null, $php);
        });
    }
}
