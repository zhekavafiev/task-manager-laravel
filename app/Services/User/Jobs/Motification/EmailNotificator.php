<?php

namespace App\Services\User\Jobs\Motification;

use App\Model\User;

final class EmailNotificator implements INotificator
{
    public function __construct()
    {
    }

    public function notify(User $user): void
    {
        // TODO: Implement notify() method.
    }
}
