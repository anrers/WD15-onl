<?php

namespace App\Observers;

use App\Models\Tasks\Task;
use \Str;

class TaskObserver
{
    /**
     * Handle the Task "saving" event.
     */
    public function saving(Task $task): void
    {
        if (empty($this->slug)) {
            $task->slug = Str::slug($task->name, '_');
        }
    }

    /**
     * Handle the Task "created" event.
     */
    public function created(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "saved" event.
     */
    public function saved(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "updated" event.
     */
    public function updated(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "deleted" event.
     */
    public function deleted(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "restored" event.
     */
    public function restored(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "force deleted" event.
     */
    public function forceDeleted(Task $task): void
    {
        //
    }
}
