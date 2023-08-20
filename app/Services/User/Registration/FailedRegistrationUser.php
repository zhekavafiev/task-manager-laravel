<?php

namespace App\Services\User\Registration;

use App\Model\User;
use App\Services\User\Registration\DTO\UserRequest;

final class FailedRegistrationUser
{
    public function __construct()
    {
    }

    public function handle(UserRequest $request): User
    {
        return User::make([
            User::NAME_COLUMN => $request->name,
            User::SECOND_COLUMN => $request->secondName,
            User::EMAIL_COLUMN => $request->email,
            User::PASSWORD_COLUMN => $request->password,
            User::PHONE_COLUMN => $request->phone,
            User::TELEGRAM_COLUMN => $request->telegram,
            User::GITHUB_COLUMN => $request->github,
            User::COUNTRY_COLUMN => $request->country,
            User::CITY_COLUMN => $request->city,
            User::BIRTHDAY_COLUMN => $request->birthday,
        ]);
    }
}
