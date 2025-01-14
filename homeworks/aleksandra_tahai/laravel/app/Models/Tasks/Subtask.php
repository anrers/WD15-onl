<?php

namespace App\Models\Tasks;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 *
 * @property int $id
 * @property int $task_id
 * @property string $name
 * @property string|null $description
 * @property string|null $createdAt
 * @property string|null $updatedAt
 * @method static \Database\Factories\Tasks\SubtaskFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subtask newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subtask newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subtask query()
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
    /** @use HasFactory<\Database\Factories\Tasks\SubtaskFactory> */
    use HasFactory;

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class, 'taskId');
    }
}
