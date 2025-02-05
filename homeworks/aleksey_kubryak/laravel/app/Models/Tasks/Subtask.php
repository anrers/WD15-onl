<?php

namespace App\Models\Tasks;

use App\Models\Tasks\Task;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property int $task_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read Task $task
 * @method static \Database\Factories\SubtaskFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subtask newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subtask newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subtask query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subtask whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subtask whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subtask whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subtask whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subtask whereUpdatedAt($value)
 * @property \Illuminate\Support\Carbon|null $createdAt
 * @property \Illuminate\Support\Carbon|null $updatedAt
 * @property-read \App\Models\Tasks\TFactory|null $use_factory
 * @mixin \Eloquent
 */
class Subtask extends BaseModel
{
    /** @use HasFactory<\Database\Factories\SubtaskFactory> */
    use HasFactory;

    protected $fillable = ['name', 'task_id'];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
}
