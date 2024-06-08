<?php

namespace Quidos\Lar\Kernel\Http;

class Request {
    function __construct(
        public string $path,
        public string $queryString,
        public string $method
    )
    {
    }
    public static function fromGlobals(): Request
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
}