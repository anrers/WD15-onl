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
 * @property int $id
 * @property int $taskId
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $createdAt
 * @property \Illuminate\Support\Carbon|null $updatedAt
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subtask whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subtask whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subtask whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subtask whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subtask whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subtask whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Subtask extends BaseModel
{
    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class, 'taskId');
    }
}
