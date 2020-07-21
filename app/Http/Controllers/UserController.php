<?php

namespace App\Http\Controllers;

use App\Jobs\SendWelcomEmail;
use App\Mail\WelcomeLetter;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        // if (session()->has('locale')) {
        //     App::setlocale(session()->get('locale'));
        // }
        $users = User::get();
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);
        SendWelcomEmail::dispatch($user);
        // Mail::to($user)->send(new WelcomeLetter($user));
        // dd(Auth::user());
        return view('users.show', compact('user'));
    }
}
