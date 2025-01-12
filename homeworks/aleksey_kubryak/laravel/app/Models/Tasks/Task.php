<?php

namespace App\Models\Tasks;

use App\Models\BaseModel;
use App\Models\Tasks\Subtask;
use App\Models\User;
use Database\Factories\Tasks\TaskFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property Carbon $dueDate
 * @property string|null $executedAt
 * @property int $status
 * @property Carbon|null $createdAt
 * @property Carbon|null $updatedAt
 * @method static TaskFactory factory($count = null, $state = [])
 * @method static Builder<static>|Task newModelQuery()
 * @method static Builder<static>|Task newQuery()
 * @method static Builder<static>|Task query()
 * @method static Builder<static>|Task whereCreatedAt($value)
 * @method static Builder<static>|Task whereDescription($value)
 * @method static Builder<static>|Task whereDueDate($value)
 * @method static Builder<static>|Task whereExecutedAt($value)
 * @method static Builder<static>|Task whereId($value)
 * @method static Builder<static>|Task whereName($value)
 * @method static Builder<static>|Task whereStatus($value)
 * @method static Builder<static>|Task whereUpdatedAt($value)
 * @property int|null $user_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Subtask> $subtask
 * @property-read int|null $subtask_count
 * @property-read User|null $user
 * @method static Builder<static>|Task whereUserId($value)
 * @mixin Eloquent
 */
class Task extends BaseModel
{
    /** @use HasFactory<TaskFactory> */
    use HasFactory;

    protected function status(): Attribute
    {
        return new Attribute(
            get: function ($statusValue) {
                $modified = (boolean) $statusValue;
                return $modified;
            },
            set: function ($statusValue) {
                return (int) $statusValue;
            }
        );
    }

    public function subtask(): HasMany
    {
        return $this->hasMany(Subtask::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function casts(): array
    {
        return [
            'dueData' => 'datetime:Y-m-d',
        ];
    }
}
