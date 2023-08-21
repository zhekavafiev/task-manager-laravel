<?php

namespace App\Services\User\Jobs\Motification;

use App\Model\User;

interface INotificator
{
    public function notify(User $user): void;
}
