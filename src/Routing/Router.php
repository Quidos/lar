<?php

namespace Quidos\Lar\Routing;

class Router {
    public string $path;
    public string $queryString;
    public string $method;
    public RouteCollection $routes;
    function __construct(string $path, string $queryString, string $method)
    {
        $this->path = $path;
        $this->queryString = $queryString;
        $this->method = $method;
        $this->routes = require_once(__DIR__ . '/Routes.php');
    }

    public static function fromGlobals(): Router
    {
        $url = '/';
        if(isset($_SERVER['REQUEST_URI'])) $url = '/' . implode('/', array_slice(explode('/', $_SERVER['REQUEST_URI']), 2));

        $urlParams = explode('?', $url);
        $path = $urlParams[0];

        $queryString = '';
        if(count($urlParams) > 1) $queryString = $urlParams[1];
        $method = $_SERVER['REQUEST_METHOD'];
        $router = new self($path, $queryString, $method);
        return $router;
    }

    public function route()
    {
        foreach ($this->routes->getRoutes() as $route) {
            $pattern = $route->regexPath;
            if(
                $route->method == $this->method &&
                preg_match('#^' . $pattern . '$#', $this->path, $matches)
            ) {
                array_shift($matches);
                list($controller, $method) = explode('@', $route->controllerMethod);
                $controller = 'Quidos\\Lar\\Controllers\\' . $controller;
                $controllerInstance = new $controller;
                call_user_func_array([$controllerInstance, $method], $matches);

            }
        }
    }
}