<?php

namespace Quidos\Lar\Kernel\Facades;

use Quidos\Lar\Kernel\Http\Response;
use Quidos\Lar\Views\View;

class ViewFacade {
    public static function view(string $view, array $vars = []): Response {
        return new Response(200, (new View($view, $vars))->render());
    }
}