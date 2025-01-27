<?php

namespace App\Jobs\Tasks;

use App\Models\Tasks\Task;
use App\Services\Tasks\TaskService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ClearTaskImagesJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Task $task,
    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(TaskService $taskService): void
    {
        $taskService->deleteImages($this->task);
    }
}
