<?php

namespace Quidos\Lar\Views;

class View
{
    private string $viewPath;
    function __construct(
        private string $view, 
        private array $vars = []
    )
    {
        $this->viewPath = 'Views/' . $view;
    }

    public function render()
    {
        extract($this->vars);
        ob_start();
        include($this->viewPath);
        $output = ob_get_clean();
        return $output;
    }
}