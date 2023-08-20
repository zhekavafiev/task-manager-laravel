<?php

namespace App\Services\User\Jobs;

use App\Model\User;

final class NotificatorFactory
{
    public function build(User $user): INotificator
    {
        if ($this->isTelegram($user)) {
            return resolve(TelegramNotificator::class);
        }

        return resolve(EmailNotificator::class);
    }

    public function isTelegram(User $user): bool
    {
        return !empty($user->telegram);
    }
}
