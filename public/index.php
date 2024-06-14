<?php

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Quidos\Lar\Kernel\Http\Request;
use Quidos\Lar\Routing\Router;

Dotenv::createImmutable(__DIR__ . '/..')->load();

$request = Request::fromGlobals();
$router = new Router($request);
$response = $router->route();
$response->send();