<?php

use Ciareis\Bypass\Bypass;
use Ciareis\Bypass\Route;

it("returns bypass", function () {
    $bypass = Bypass::serve(
        Route::forbidden("/teste"),
        Route::forbidden("/xxxxx")
    );

    expect($bypass)->toBeInstanceOf(Bypass::class);
    expect($bypass->getRoutes())->toHaveCount(2);
});
