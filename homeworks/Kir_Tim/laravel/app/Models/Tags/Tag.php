<?php

namespace App\Models\Tags;

use App\Models\BaseModel;
use App\Models\Tasks\Task;
use Database\Factories\Tags\TagFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends BaseModel
{
    /** @use HasFactory<TagFactory> */
    use HasFactory;

    public static function find(int $id)
    {
    }

    public function tasks(): BelongsToMany
    {
        return $this->belongsToMany(Task::class, 'tag_task', 'taskId', 'tagId');
    }
}
