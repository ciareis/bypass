<?php

use Ciareis\Bypass\Bypass;

test('multiple calls', function () {
    $bypass = Bypass::open();

    $bypass->addRoute(method: 'GET', uri: '/my-route', body: 'foo bar', times: 2);

    $result1 = file_get_contents($bypass->getBaseUrl() . '/my-route');
    $result2 = file_get_contents($bypass->getBaseUrl() . '/my-route');

    $bypass->assertRoutes();

    $this->assertSame('foo bar', $result1, 'Failed first result');
    $this->assertSame('foo bar', $result2, 'Failed second result');
});
