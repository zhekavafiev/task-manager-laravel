<?php

namespace App\Services\User;

use App\Model\User;
use App\Services\User\DTO\AvatarRequest;

final class AvatarService
{
    public function __construct()
    {
    }

    public function handle(AvatarRequest $avatarRequest)
    {
        \Storage::allFiles();
        $result = \Storage::put('test/avatar', $avatarRequest->getAvatar());
        if (!$result) {
            return;
        }
        $user = User::findOrFail($avatarRequest->getUserId());
        $user->avatar = $result;
        $user->save();
    }
}
