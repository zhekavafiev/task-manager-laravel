<?php

namespace App\Listeners;

use App\Events\UserRegisterEvent;
use App\Jobs\UserCreatedNotificationJob;

class UserRegisterListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegisterEvent $event): void
    {
        UserCreatedNotificationJob::dispatch($event->user);
    }
}
