<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\App;

class UserController extends Controller
{
    public function index()
    {
        if (session()->has('locale')) {
            App::setlocale(session()->get('locale'));
        }
        $users = User::get();
        return view('users.index', compact('users'));
    }
}
