<?php

namespace App\Services\User\Jobs;

use App\Model\User;

interface INotificator
{
    public function notify(User $user): void;
}
