<?php

function writeFile($filename, $content)
{
    if (!file_put_contents($filename, json_encode($content))) {
        return false;
    }

    return true;
}

function getFilename($route, $method)
{
    $sessionName = getSessionName();

    $method = strtoupper($method);
    $route = md5($route);

    return "{$sessionName}_{$method}_{$route}.tmp";
}

function getSessionName()
{
    return sys_get_temp_dir() . DIRECTORY_SEPARATOR . "session_name_{$_SERVER['SERVER_PORT']}";
}

function getRoute(string $route, ?string $method = null)
{
    $file = getFilename($route, $method);

    if (!file_exists($file)) {
        return "";
    }

    return file_get_contents($file);
}

function setRoute(string $route, string $method, array $value)
{
    $file = getFilename($route, $method);

    $content = [
        'uri' => $route,
        'method' => $method,
        'status' => $value['status'],
        'content' => $value['content'] ?? null,
        'file' => $value['file'] ?? null,
        'count' => isset($value['count']) ? $value['count'] + 1 : 0
    ];

    writeFile($file, $content);
}

function currentRoute()
{
    return getRoute($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
}
