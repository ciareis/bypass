<?php

function cleanSession(): bool
{
    $session = getSessionName();

    if (isset($_SESSION[$session])) {
        unset($_SESSION[$session]);
    }

    return true;
}

function getSessionName()
{
    return "session_name_{$_SERVER['SERVER_PORT']}";
}

function getRoutes()
{
    $sessionName = getSessionName();

    return $_SESSION[$sessionName] ?? null;
}

function getRoute(string $route, ?string $method = null)
{
    $sessionName = getSessionName();

    if (!$method) {
        return $_SESSION[$sessionName][$route] ?? null;
    }

    return $_SESSION[$sessionName][$route][$method] ?? null;
}

function setRoute(string $route, string $method, array $value)
{
    $sessionName = getSessionName();

    $method = strtoupper($method);

    $_SESSION[$sessionName][$route][$method] = $value;
}

function currentRoute()
{
    return getRoute($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
}
