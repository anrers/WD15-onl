<?php

namespace App\Models\Subtasks;

use App\Models\BaseModel;
use App\Models\Tasks\Task;
use Database\Factories\Subtask\SubtaskFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subtask extends BaseModel
{
    /** @use HasFactory<SubtaskFactory> */
    use HasFactory;

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class, 'task_id');
    }
}
