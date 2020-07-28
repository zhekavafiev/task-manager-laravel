<?php

namespace App\Jobs;

use App\Mail\WelcomeLetter;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Rollbar\Payload\Level;
use Rollbar\Rollbar;

class SendWelcomEmail implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    private $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            Mail::to($this->user)->send(new WelcomeLetter($this->user));
            Log::info("Letter was send to {$this->user->name}");
            Rollbar::log(Level::INFO, "Letter was send to {$this->user->name}");
        } catch (Exception $e) {
            Rollbar::log(Level::ERROR, 'Error:' . $e->getMessage());
            Log::info('Error:' . $e->getMessage());
        }
    }
}
