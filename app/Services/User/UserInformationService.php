<?php

namespace App\Services\User;

use App\Helpers\ImageFullPathGetter;
use App\Model\User;
use App\Services\User\DTO\UserResponse;

final class UserInformationService
{
    public function get(int $userId): UserResponse
    {
        $user = User::findOrFail($userId);
        return new UserResponse(
            $user->id,
            $user->name,
            $user->second_name,
            $user->email,
            $user->phone,
            $user->telegram,
            $user->github,
            $user->country,
            $user->city,
            $user->user_role_id,
            !is_null($user->email_verified_at),
            $user->birthday,
            ImageFullPathGetter::getFullPath('/avatar/' . $user->avatar) // TODO указать конфиг с бакета
        );
    }
}
