<?php

include_once("lib/functions.php");

if ($_SERVER['REQUEST_METHOD'] === "GET" && $_SERVER['PHP_SELF'] === '/___api_faker_router') {
    $route = getRoute($_GET['route'], $_GET['method']);
    $route = json_decode($route, true);

    echo $route['count'];

    exit;
}

if ($_SERVER['REQUEST_METHOD'] === "DELETE" && $_SERVER['REQUEST_URI'] === '/___api_faker_router') {
    $sessionName = getSessionName();

    foreach (glob($sessionName . "_*.tmp") as $file) {
        @unlink($file);
    }
    echo "ok.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === "POST" && $_SERVER['REQUEST_URI'] === '/___api_faker_router') {
    $inputs = file_get_contents("php://input");
    $router = json_decode($inputs, true);

    setRoute($router['uri'], $router['method'], $router);
    http_response_code(200);

    echo "ok.";
    exit;
}

if ($route = currentRoute()) {
    $route = json_decode($route, true);

    foreach ($route['headers'] ?? [] as $header => $headerLines) {
        $headerLines = (array) $headerLines;
        foreach ($headerLines as $headerLine) {
            header(header: "{$header}: {$headerLine}", replace: false);
        }
    }

    http_response_code($route['status']);
    setRoute($route['uri'], $route['method'], $route);

    if (($route['file'] !== null)) {
        echo base64_decode($route['file']);

        exit;
    }

    echo $route['body'];

    exit;
}

http_response_code(500);
$route = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
echo "Bypass route {$route} and method {$method} not found.";
