<?php

namespace App\Models\Tasks;

use App\Models\BaseModel;
use Database\Factories\Tasks\TaskFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

/**
 *
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $dueDate
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
}
