<?php

namespace Quidos\Lar\Kernel\Http;

class Response {
    function __construct(
        public int $status = 200,
        public string $content,
    )
    {
        
    }

    public function send() {
        http_response_code($this->status);
        echo $this->content;
    }
}