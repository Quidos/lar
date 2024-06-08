<?php

namespace Quidos\Lar\Controllers;

use Quidos\Lar\Kernel\Facades\ViewFacade;
use Quidos\Lar\Views\View;

class UserController 
{

    public function index()
    {
        return ViewFacade::view('Users/Index.php', ['myVar' => 'h']);
    }
    public function show(string $id)
    {
        return new View('Users/Show.php', ['id' => $id]);
    }

    public function create()
    {
        return new View('Users/Show.php');
    }
}