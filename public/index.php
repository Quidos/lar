<?php

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Quidos\Lar\Kernel\Http\Request;

Dotenv::createImmutable(__DIR__ . '/..')->load();

use Quidos\Lar\Kernel\Kernel;
use Quidos\Lar\Routing\Router;

$request = Request::fromGlobals();
$router = new Router($request);
$response = $router->route();
$response->send();