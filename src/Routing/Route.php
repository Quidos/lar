<?php

namespace Quidos\Lar\Routing;

class Route {
    public string $uri;
    public string $method;
    function __construct(string $method, string $uri)
    {
        $this->uri = $uri;
        $this->method = $method;
    }
}