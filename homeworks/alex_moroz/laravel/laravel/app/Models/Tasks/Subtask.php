<?php

namespace App\Models\Tasks;

use App\Models\BaseModel;
use Database\Factories\Tasks\SubtaskFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subtask extends BaseModel
{
    /** @use HasFactory<SubtaskFactory> */
    use HasFactory;

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class, 'taskId');
    }
}
