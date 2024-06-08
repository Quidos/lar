<?php

namespace Quidos\Lar\Routing;

use Quidos\Lar\Kernel\Http\Request;
use Quidos\Lar\Kernel\Http\Response;

class Router {
    private RouteCollection $routes;
    function __construct(private Request $request)
    {
        $this->routes = require_once(__DIR__ . '/Routes.php');
    }

    public function route(): ?Response
    {
        foreach ($this->routes->getRoutes() as $route) {
            $pattern = $route->regexPath;
            if(
                $route->method == $this->request->method &&
                preg_match('#^' . $pattern . '$#', $this->request->path, $matches)
            ) {
                array_shift($matches);
                list($controller, $method) = explode('@', $route->controllerMethod);
                $controller = 'Quidos\\Lar\\Controllers\\' . $controller;
                $controllerInstance = new $controller;
                $response = call_user_func_array([$controllerInstance, $method], $matches);
                return $response;
            }
        }
    }
}