<?php

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

Dotenv::createImmutable(__DIR__ . '/..')->load();

use Quidos\Lar\Kernel\Kernel;
use Quidos\Lar\Routing\Router;

// $router = new Routing\Router();
//$router->test();
// $routes = require_once(__DIR__ . '/../src/Routing/Routes.php');
// var_dump($routes);

$router = Router::fromGlobals();
echo $router::sayHi();
var_dump($router->routes);