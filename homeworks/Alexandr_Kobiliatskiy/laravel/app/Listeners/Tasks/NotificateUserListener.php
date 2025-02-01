<?php

namespace App\Listeners\Tasks;

use App\Events\Tasks\CompleteTaskEvent;
use App\Jobs\NotificationJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotificateUserListener
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
        //dd($event);
        $msg = "Задача {$event->task->name} была выполнена сейчас";
        //dd($msg);
        NotificationJob::dispatch($msg)->onQueue('notifications');
    }
}
