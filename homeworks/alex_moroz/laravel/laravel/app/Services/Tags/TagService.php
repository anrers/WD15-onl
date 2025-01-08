<?php

namespace App\Services\Tags;

use App\Contracts\Services\AbstractEntityService;
use App\Contracts\Services\Tags\TagServiceInterface;
use App\Models\Tags\Tag;

class TagService extends AbstractEntityService implements TagServiceInterface
{
    function getModelClass(): string
    {
        return Tag::class;
    }

    public function getById(int $id): ?Tag
    {
        return $this->builder()->find($id);
    }

    public function create(array $data): ?Tag
    {
        $task = new Tag();
        $task->name = $data['name'];

        $task->save();

        return $task;
    }

    public function update(int $id, array $data): ?Tag
    {
        /**
         * @var Tag $tag
         */
        $tag = $this->builder()->find($id);

        $tag->name = $data['name'];

        $tag->save();

        return $tag;
    }

    public function delete(int $id): bool
    {
        /**
         * @var Tag $tag
         */
        $tag = $this->builder()->find($id);
        return $tag->delete();
    }
}
