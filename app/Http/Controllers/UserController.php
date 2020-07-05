<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

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

    public function show($id)
    {
        $user = User::find($id);
        dd(Auth::user());
        return view('users.show', compact('user'));
    }
}
