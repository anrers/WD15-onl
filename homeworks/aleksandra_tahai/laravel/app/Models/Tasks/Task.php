<?php

namespace App\Models\Tasks;

use App\Models\BaseModel;
use App\Models\User;
use Database\Factories\Tasks\TaskFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tasks\Subtask> $subtask
 * @property-read int|null $subtask_count
 * @property-read User|null $user
 * @method static \Database\Factories\Tasks\TaskFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task query()
 * @mixin \Eloquent
 */
class Task extends BaseModel
{
    /** @use HasFactory<TaskFactory> */
    use HasFactory;

    public function subtask(): HasMany
    {
        return $this->hasMany(Subtask::class, 'subtaskId', 'id');
    }

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }
}
