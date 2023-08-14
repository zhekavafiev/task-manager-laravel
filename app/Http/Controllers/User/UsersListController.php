<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\User;

class UsersListController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('users.index', compact('users'));
    }
}
