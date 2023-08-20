<?php

namespace App\Services\User\Jobs;

use App\Model\User;

final class TelegramNotificator implements INotificator
{
    public function __construct()
    {
    }


    public function notify(User $user): void
    {
        // TODO: Implement notify() method.
    }
}
