<?php

namespace App\Services\User;

use App\Model\User;
use App\Services\User\DTO\UserResponse;

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
            'http://127.0.0.1:9000' . '/avatar/' . $user->avatar,
        );
    }
}
