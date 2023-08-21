<?php

namespace App\Services\User\Registration\DTO;

use Hash;
use Illuminate\Http\Request;

final readonly class UserRequest
{
    public function __construct(
        public string $name,
        public ?string $secondName,
        public string $email,
        public string $password,
        public ?string $phone,
        public ?string $telegram,
        public ?string $github,
        public ?string $country,
        public ?string $city,
        public string $birthday
    ) {
    }

    public static function createFromRequest(Request $request): self
    {
        return new self(
            $request->get('name'),
            $request->get('second_name'),
            $request->get('email'),
            Hash::make($request->get('password')),
            $request->get('phone'),
            $request->get('telegram'),
            $request->get('github'),
            $request->get('country'),
            $request->get('city'),
            $request->get('birthday'),
        );
    }
}
