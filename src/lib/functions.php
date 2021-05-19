<?php

function writeFile($filename, $content)
{
    /*
    $content = "";
    foreach ($assoc_arr as $key => $elem) {
        $content .= "[" . $key . "]\n";
        foreach ($elem as $key2 => $elem2) {
            if (is_array($elem2)) {
                for ($i = 0; $i < count($elem2); $i++) {
                    $content .= $key2 . "[] = \"" . $elem2[$i] . "\"\n";
                }
            } elseif ($elem2 == "") {
                $content .= $key2 . " = \n";
            } else {
                $content .= $key2 . " = \"" . $elem2 . "\"\n";
            }
        }
    }
*/
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

    $file =  "{$sessionName}_{$method}_{$route}.tmp";

    return $file;
}

function getSessionName()
{
    return sys_get_temp_dir() . DIRECTORY_SEPARATOR . "session_name_{$_SERVER['SERVER_PORT']}";
}

function getRoute(string $route, string $method = null)
{
    $file = getFilename($route, $method);

    if (!file_exists($file)) {
        return;
    }

    return file_get_contents($file);
}

function setRoute(string $route, string $method, array $value)
{
    $file = getFilename($route, $method);

    $content = [
        'status' => $value['status'],
        'content' => $value['content']
    ];

    writeFile($file, $content);
}

function currentRoute()
{
    return getRoute($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
}
