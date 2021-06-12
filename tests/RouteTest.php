<?php

use Ciareis\Bypass\Bypass;
use Ciareis\Bypass\Route;

it("returns propriets", function () {
    $route = Route::forbidden("/teste");

    dd($route->toArray());
});
