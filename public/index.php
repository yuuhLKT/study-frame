<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\TestController;
use App\Core\Http\Request;
use App\Core\Routing\Router;

$request = Request::capture();

$router = new Router();

$router->get("/", [HomeController::class, 'index']);
$router->get("/test", [TestController::class, 'index']);


$response = $router->dispatch($request);

$response->send();
