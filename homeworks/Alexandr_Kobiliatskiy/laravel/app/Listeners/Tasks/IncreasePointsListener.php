<?php

namespace App\Listeners\Tasks;

use App\Events\Tasks\CompleteTaskEvent;
use App\Services\Tasks\TaskService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
        //dump($event);
        $this->taskService->increasePoints($event->task);
    }
}
