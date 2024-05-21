<?php

namespace Quidos\Lar\Routing;

class RouteCollection {

    public array $routes;

    function __construct() 
    {
        $this->routes = [];
    }

    function add(Route $route)
    {
        array_push($this->routes, $route);
    }
}