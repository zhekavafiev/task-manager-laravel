<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\User;
use Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
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

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::whereEmail($request->get('email'))->first();
        if (empty($user)) {
            return redirect()->back();
        }

        if (!Hash::check($request->get('password'), $user->password)) {
            return redirect()->back();
        }

        \Auth::login($user);
        return redirect()->route('users.show', $user) ;
    }
}
