<?php

namespace Quidos\Lar\Controllers;

use Quidos\Lar\Kernel\Facades\ViewFacade;
use Quidos\Lar\Models\User;

class UserController 
{

    public function index()
    {
        $users = (new User())->all();
        return ViewFacade::view('Users/Index.php', ['users' => $users]);
    }
    public function show(string $id)
    {
        $user = (new User())->find(intval($id));
        return ViewFacade::view('Users/Show.php', ['user' => $user]);
    }
}