<?php

namespace Quidos\Lar\Routing;

class Route {
    public string $regexPath;
    function __construct(
        public string $method, 
        public string $path,
        public string $controllerMethod,
    )
    {
        $this->regexPath = preg_replace('/\{[A-z]+\}/', '([a-zA-Z0-9]+)', $path);
    }
}