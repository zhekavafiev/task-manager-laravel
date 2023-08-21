<?php

namespace App\Services\User\Registration;

use App\Model\User;
use App\Services\User\Registration\DTO\UserRequest;
use App\Services\User\Registration\Exception\DublicateEmailException;

final class RegistrationService
{
    public function __construct()
    {
    }

    public function register(UserRequest $request): User
    {
        $usersWithEmail = User::whereEmail($request->email)->get();
        if ($usersWithEmail->isNotEmpty()) {
            throw new DublicateEmailException('Какое то сообщение'); //TODO
        }
        return User::create([
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
