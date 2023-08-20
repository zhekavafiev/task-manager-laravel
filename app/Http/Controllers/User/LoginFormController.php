<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class LoginFormController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function form()
    {
        return view('auth.login');
    }
}
