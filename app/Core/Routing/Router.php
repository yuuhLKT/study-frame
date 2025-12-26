<?php

declare(strict_types=1);

namespace App\Core\Routing;

use App\Contracts\RouterInterface;

class Router implements RouterInterface
{
    private static array $routes = [];
    public static function get(string $uri, array $action): void
    {
        self::add('GET', $uri, $action);
    }

    public static function post(string $uri, array $action): void
    {
        self::add('POST', $uri, $action);
    }

    private static function add(string $method, string $uri, array $action): void
    {

        $routeObject = \App\Core\Routing\Route::make($method, $uri, $action);

        self::$routes[$method][$uri] = $routeObject;
    }

    public static function dispatch(): void
    {
        $uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
        $method = $_SERVER['REQUEST_METHOD'];

        if (!isset(self::$routes[$method][$uri])) {
            echo "404 - Página não encontrada";
            return;
        }

        $route = self::$routes[$method][$uri];

        $controller = new $route->controller;
        $action = $route->action;

        call_user_func(array($controller, $action));
    }
}
