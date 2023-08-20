<?php

namespace App\Services\User\Http;

use App\Model\User;
use App\Services\User\Http\DTO\UserResponse;

final class UserInformationService
{
    public function __construct()
    {
    }

    public function get(int $userId): UserResponse
    {
        $user = User::findOrFail($userId);
        return new UserResponse(
            $user->id,
            $user->name,
            $user->email,
        );
    }
}
