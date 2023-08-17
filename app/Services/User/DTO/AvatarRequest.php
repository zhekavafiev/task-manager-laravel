<?php

namespace App\Services\User\DTO;

use Illuminate\Http\UploadedFile;

final readonly class AvatarRequest
{
    public function __construct(
        private int $userId,
        private UploadedFile $avatar
    ) {
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getAvatar(): UploadedFile
    {
        return $this->avatar;
    }
}
