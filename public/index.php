<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\TestController;
use App\Core\Routing\Router;

$router = new Router();

$router->get("/", [HomeController::class, 'index']);
$router->get("/test", [TestController::class, 'index']);


$router->dispatch();
