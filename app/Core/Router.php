<?php

namespace App\Core;

class Router
{

    public static function get($uri, $action)
    {
        echo "URI: " . $uri . " - " . "CLASSE: " . $action[0] . " - FUNCTION: " . $action[1];
    }

    public static function post($uri, $action) {}

    public static function dispatch()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        echo $uri . " - " . $method;
    }
}
