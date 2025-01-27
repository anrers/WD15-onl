<?php

namespace App\Models\Tasks;

use App\Models\BaseModel;
use App\Models\User;
use Database\Factories\Tasks\TaskFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 *
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $dueDate
 * @property string|null $executedAt
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $createdAt
 * @property \Illuminate\Support\Carbon|null $updatedAt
 * @method static \Database\Factories\Tasks\TaskFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereExecutedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Task extends BaseModel
{
    /** @use HasFactory<TaskFactory> */
    use HasFactory;

    public function subtasks(): HasMany
    {
        return $this->hasMany(Subtask::class, 'taskId');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
