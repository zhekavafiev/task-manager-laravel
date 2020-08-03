<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class WelcomeLetter extends Mailable
{
    use Queueable;
    use SerializesModels;

    private $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        Log::info('Welcome letter was sent to ' . $this->user->email);
        return $this->from('examole@example.com')->view('mail.welcome')->with(['name' => $this->user->name]);
    }
}
