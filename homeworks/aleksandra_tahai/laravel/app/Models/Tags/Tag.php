<?php

namespace App\Models\Tags;

use App\Models\BaseModel;
use App\Models\Tasks\Task;
use Database\Factories\Tags\TagFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 *
 *
 * @property int $id
 * @property string $name
 * @property string|null $createdAt
 * @property string|null $updatedAt
 * @method static TagFactory factory($count = null, $state = [])
 * @method static Builder<static>|Tag newModelQuery()
 * @method static Builder<static>|Tag newQuery()
 * @method static Builder<static>|Tag query()
 * @method static Builder<static>|Tag whereCreatedAt($value)
 * @method static Builder<static>|Tag whereId($value)
 * @method static Builder<static>|Tag whereName($value)
 * @method static Builder<static>|Tag whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tag extends BaseModel
{
    /** @use HasFactory<TagFactory> */
    use HasFactory;

    public function tasks(): BelongsToMany
    {
        return $this->belongsToMany(Task::class);
    }
}
