<?php

namespace App\Jobs;

use App\Notifications\Notificator;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class NotificationJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public string $message,
    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(Notificator $notificator): void
    {
        $notificator->send($this->message);
    }
}
