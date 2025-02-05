<?php

namespace App\Models\Tasks;

use App\Models\BaseModel;
use App\Models\Tasks\Subtask;
use App\Models\User;
use App\Events\TaskSaving;
use Database\Factories\Tasks\TaskFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

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
 * @property string|null $slug
 * @property-read \App\Models\Tasks\Task|null $use_factory
 * @method static Builder<static>|Task whereSlug($value)
 * @mixin Eloquent
 */
class Task extends BaseModel
{
    /** @use HasFactory<TaskFactory> */
    use HasFactory;

    /**
     * The event map for the model.
     *
     * @var array<string, string>
     */
    protected $dispatchesEvents = [
        'saving' => TaskSaving::class,
    ];

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
