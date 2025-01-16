<?php

namespace App\Jobs;

use App\Services\Tasks\TaskService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class FillEmptySlugJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(TaskService $taskService): void
    {
        $taskService->updateTasksWithEmptySlug();
    }
}
