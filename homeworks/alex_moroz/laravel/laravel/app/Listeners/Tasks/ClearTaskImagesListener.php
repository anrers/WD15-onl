<?php

namespace App\Listeners\Tasks;

use App\Events\Tasks\CompleteTaskEvent;
use App\Jobs\Tasks\ClearTaskImagesJob;
use App\Services\Tasks\TaskService;

class ClearTaskImagesListener
{
    /**
     * Create the event listener.
     */
    public function __construct(public TaskService $taskService)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CompleteTaskEvent $event): void
    {
        ClearTaskImagesJob::dispatch($event->task)->onQueue('clear_task_images');
    }
}
