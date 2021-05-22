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
        $this->mergeConfigFrom(__DIR__.'/../config/bypass.php', 'bypass');
        
        $this->app->bind(Bypass::class, function ($app) {
            $port = $app['config']['bypass']['port'];

            return Bypass::open($port);
        });
    }
}
