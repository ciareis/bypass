<?php

include_once("lib/functions.php");

if ($_SERVER['REQUEST_METHOD'] === "PUT" && $_SERVER['REQUEST_URI'] === '/___api_faker_clear_router') {
    $sessionName = getSessionName();
    $dir = dirname($sessionName);
    $basename = basename($sessionName);

    if ($handle = opendir($dir)) {
        while (false !== ($entry = readdir($handle))) {
            $file = $entry;
            if (str_starts_with($entry, $basename)) {
                @unlink($dir . DIRECTORY_SEPARATOR . $entry);
            }
        }

        closedir($handle);
    }
    echo "ok.";
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === "PUT" && $_SERVER['REQUEST_URI'] === '/___api_faker_add_router') {
    $router = json_decode(file_get_contents("php://input"), true);

    setRoute($router['uri'], $router['method'], $router);
    http_response_code(200);

    echo "ok.";
    exit;
}

if ($route = currentRoute()) {
    $route = json_decode($route, true);
    // $file = getFilename();

    // if (file_exists($file)) {
    //     @unlink($file);
    // }
    http_response_code($route['status']);

    echo $route['content'];

    exit;
}

http_response_code(500);
echo "Bypass route not found.";
