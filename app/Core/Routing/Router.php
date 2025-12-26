<?php

declare(strict_types=1);

namespace App\Core\Routing;

use App\Contracts\RouterInterface;
use App\Core\Http\Request;
use App\Core\Http\Response;

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

    public static function dispatch(Request $request): Response
    {
        $uri = $request->getUri();
        $method = $request->getMethod();

        if (!isset(self::$routes[$method][$uri])) {
            return Response::json(['error' => '404 Not Found'], 404);
        }

        $route = self::$routes[$method][$uri];

        $controller = new $route->controller;
        $action = $route->action;

        $response = call_user_func_array([$controller, $action], [$request]);

        return $response;
    }
}
