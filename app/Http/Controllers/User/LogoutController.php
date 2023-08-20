<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\User;
use Hash;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function login(Request $request)
    {
        \Auth::logout();
        return redirect()->route('welcome') ;
    }
}
