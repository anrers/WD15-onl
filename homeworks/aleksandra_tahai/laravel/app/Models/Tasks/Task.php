<?php

namespace App\Models\Tasks;

use App\Models\BaseModel;
use App\Models\Tags\Tag;
use App\Models\User;
use Carbon\Carbon;
use Database\Factories\Tasks\TaskFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property Carbon $dueDate
 * @property string|null $executedAt
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $createdAt
 * @property \Illuminate\Support\Carbon|null $updatedAt
 * @property int|null $userId
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Tag> $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereExecutedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereUserId($value)
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

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'tag_task', 'task_id', 'tag_id');
    }

    protected function casts(): array
    {
        return [
            'dueDate' => 'datetime:Y-m-d',
        ];
    }
}
