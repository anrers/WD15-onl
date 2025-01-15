<?php

namespace App\Models\Tasks;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property-read \App\Models\Tasks\Task|null $task
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subtask newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subtask newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subtask query()
 * @mixin \Eloquent
 */
class Subtask extends BaseModel
{
    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class, 'taskId');
    }
}
