<?php

namespace Quidos\Lar\Routing;

class Router {
    public string $path;
    public RouteCollection $routes;
    function __construct(string $path)
    {
        $this->path = $path;
        $this->routes = require_once(__DIR__ . '/Routes.php');
    }

    public static function fromGlobals()
    {
        $path = '/';
        if(isset($_SERVER['REQUEST_URI'])) $path = '/' . implode('/', array_slice(explode('/', $_SERVER['REQUEST_URI']), 2));
        $router = new self($path);
        return $router;
    }

    public static function sayHi()
    {
        return "hello, {2+2}";
    }
}