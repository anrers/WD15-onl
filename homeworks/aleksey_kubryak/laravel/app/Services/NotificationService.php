<?php

namespace App\Services;

use App\Models\Tasks\Task;
use Log;

class NotificationService
{
    public function sendTaskCompletionNotification(Task $task)
    {
        Log::info("Задача выполнена: {$task->id} - {$task->name}");
    }
}
