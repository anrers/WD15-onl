<?php

namespace App\Listeners\Tasks;

use App\Events\Tasks\CompleteTaskEvent;
use App\Jobs\NotificationJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotificationUserListener
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
    public function handle(CompleteTaskEvent $event): void
    {
        $time = now();
        NotificationJob::dispatch("Task {$event->task->name} was completed at {$time}")
            ->onQueue('notifications');
    }
}
