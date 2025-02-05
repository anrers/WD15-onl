<?php

namespace App\Listeners;

use App\Events\TaskSaving;
use Illuminate\Support\Str;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GenerateTaskSlug
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
    public function handle(TaskSaving $event): void
    {
        $task = $event->task;

        if (empty($task->slug)) {
            $task->slug = Str::slug($task->name);
        }
    }
}
