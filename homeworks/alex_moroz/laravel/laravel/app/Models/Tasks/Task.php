<?php

namespace App\Models\Tasks;

use App\Models\BaseModel;
use App\Models\Tags\Tag;
use App\Models\User;
use App\Observers\TaskObserver;
use Database\Factories\Tasks\TaskFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 *
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $status
 * @property string $dueDate
 * @property string|null $executedAt
 * @property Carbon|null $createdAt
 * @property Carbon|null $updatedAt
 * @property int $userId
 * @property-read Collection<int, \App\Models\Tasks\Subtask> $subtasks
 * @property-read int|null $subtasks_count
 * @property-read User|null $user
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
 * @method static Builder<static>|Task whereUserId($value)
 * @property string|null $slug
 * @property-read Collection<int, Tag> $tags
 * @property-read int|null $tags_count
 * @method static Builder<static>|Task whereSlug($value)
 * @mixin Eloquent
 */
#[ObservedBy([TaskObserver::class])]
class Task extends BaseModel
{
    /** @use HasFactory<TaskFactory> */
    use HasFactory, HasSlug;

    public function getSlugOptions(): SlugOptions // при сохранении модели, https://github.com/spatie/laravel-sluggable
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->usingSeparator('_')
            ->skipGenerateWhen(fn() => isset($this->slug));
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'tag_task', 'taskId', 'tagId');
    }

    public function subtasks(): HasMany
    {
        return $this->hasMany(Subtask::class, 'taskId');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userId');
    }

    protected function casts(): array
    {
        return [
            'dueDate' => 'datetime:Y-m-d',
        ];
    }

    protected function status(): Attribute
    {
        return new Attribute(
            get: function ($statusValue) {
                return (boolean)$statusValue;
            },
            set: function ($statusValue) {
                return (int)$statusValue;
            },
        );
    }
}
