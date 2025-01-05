<?php

namespace App\Models\Tasks;

use App\Models\BaseModel;
use App\Models\User;
use Database\Factories\Tasks\TaskFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends BaseModel
{
    /** @use HasFactory<TaskFactory> */
    use HasFactory;

    public function subtasks(): HasMany
    {
        return $this->hasMany(Subtask::class, 'taskId');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
