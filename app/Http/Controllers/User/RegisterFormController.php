<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\User;
use App\Services\User\Registration\DTO\UserRequest;
use App\Services\User\Registration\FormRequest\RegistrationFormRequest;
use Illuminate\Support\Facades\Hash;

class RegisterFormController extends Controller
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
        return view('auth.register');
    }
}
