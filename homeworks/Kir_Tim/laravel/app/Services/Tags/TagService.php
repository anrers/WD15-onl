<?php

namespace App\Services\Tags;

use App\Contracts\Services\AbstractEntityServiceInterface;
use App\Contracts\Services\EntityServiceInterface;
use App\Contracts\Services\TagServiceInterface;
use App\Models\BaseModel;
use Ramsey\Collection\Collection;
use App\Models\Tags\Tag;


class TagService extends AbstractEntityServiceInterface
{

    public function getById(int $id): ?BaseModel
    {
        return Tag::find($id);

    }

    function getModelClass(): string
    {
        return Tag::class;
    }


    public function create(array $data): ?Tag
    {
        $task = new Tag();
        $task->name = $data['name'];
        $task->save();
        return $task;
    }

    public function update(array $data, int $id): ?Tag
    {
        /**
         * @var Tag $tag
         */
        $tag = Tag::find($id);
        $tag->name = $data['name'];
        $tag->save();
        return $tag;
    }

    public function delete(int $id): bool
    {
        /**
         * @var Tag $tag
         */

        $tag = Tag::find($id);
        return $tag->delete();
    }
}
