<?php

session_start();
include_once("lib/functions.php");

if ($_SERVER['REQUEST_METHOD'] === "POST" && $_SERVER['REQUEST_URI'] === '/___api_faker_clear_router') {
    cleanSession();
    echo "ok.";
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === "POST" && $_SERVER['REQUEST_URI'] === '/___api_faker_add_router') {
    $router = json_decode(file_get_contents("php://input"), true);

    setRoute($router['uri'], $router['method'], $router);
    http_response_code(200);
    echo "ok.";

    exit;
}

if ($route = currentRoute()) {
    http_response_code($route['status']);

    echo $route['content'];
    exit;
}

http_response_code(500);
echo "Bypass route not found.";

echo "<pre>";
print_r($route);

echo "<br>...";


print_r($_SESSION);

echo $_SERVER['REQUEST_URI'];
echo "<br>";
echo  $_SERVER['REQUEST_METHOD'];
echo "<br>";

echo "xxx<pre>";
print_r(getRoute($_SERVER['REQUEST_URI']));

$sessionName = getSessionName();

echo $sessionName;


print_r($_SESSION[$sessionName] ?? []);


print_r($_SESSION);
