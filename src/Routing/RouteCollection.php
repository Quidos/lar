<?php

namespace Quidos\Lar\Routing;

class RouteCollection {

    private array $routes;

    function __construct() 
    {
        $this->routes = [];
    }

    private function add(string $method, string $route, string $controllerMethod)
    {
        array_push($this->routes, new Route($method, $route, $controllerMethod));
    }

    /**
     * @return Route[]
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }

    public function get(string $route, string $controllerMethod) 
    {
        $this->add('GET', $route, $controllerMethod);
    }

    public function post(string $route, string $controllerMethod) 
    {
        $this->add('POST', $route, $controllerMethod);
    }
}