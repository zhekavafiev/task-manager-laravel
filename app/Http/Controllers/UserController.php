<?php

namespace App\Http\Controllers;

use App\Model\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('users.index', compact('users'));
    }
}
