<?php

namespace App\Services\User\Registration\FormRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

final class RegistrationFormRequest extends FormRequest
{
    public function rules(): array
    {

        return [
            'name' => 'required|string|max:255',
            'second_name' => 'nullable|string|max:255',
            'email' => 'required|string|max:255|email',
            'password' => 'required|confirmed|min:1',
            'phone' => 'nullable|string|max:255',
            'telegram' => 'nullable|string|max:255',
            'github' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'birthday' => 'date|before:today',
        ];
    }
}
