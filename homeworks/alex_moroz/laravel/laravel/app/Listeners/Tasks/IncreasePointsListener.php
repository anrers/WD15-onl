<?php

namespace App\Listeners\Tasks;

use App\Events\Tasks\CompleteTaskEvent;
use App\Services\Tasks\TaskService;

class IncreasePointsListener
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
        $this->taskService->increasePoints($event->task);
    }
}
