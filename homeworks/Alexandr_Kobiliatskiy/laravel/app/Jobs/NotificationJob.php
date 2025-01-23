<?php

namespace App\Jobs;

use App\Notification\Notificator;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class  NotificationJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public string $msg,
    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(
        Notificator $notificator,
    ): void
    {
        $notificator->send($this->msg);
    }
}
