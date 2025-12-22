<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Core\Router;

$router = new Router();

$router->get("/", [HomeController::class, 'index']);
echo "<br>";
echo "<br>";
$router->dispatch();
