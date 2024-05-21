<?php

namespace Quidos\Lar\Controllers;
use Quidos\Lar\Views\View;

class UserController 
{
    public function show(string $id)
    {
        return new View('Users/Show.php', ['id' => $id]);
    }
}