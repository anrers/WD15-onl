<?php

namespace App\Services\Tags;

use App\Contracts\Services\Tags\TagServiceInterface;
use App\Models\BaseModel;
use App\Models\Tags\Tag;
use Illuminate\Support\Collection;

class TagService implements TagServiceInterface
{

    public function getById(int $id): ?BaseModel
    {
        return Tag::find($id);
    }

    public function getAll(): Collection
    {
        return Tag::all();
    }

    public function create(array $data): ?BaseModel
    {
        $tag = new Tag();
        $tag->name = $data['name'];
        $tag->save();
        return $tag;
    }

    public function update(int $id, array $data): ?BaseModel
    {
        $tag = Tag::find($id);
        $tag->name = $data['name'];
        $tag->save();
        return $tag;
    }

    public function delete(int $id): bool
    {
        $tag = Tag::find($id);
        return $tag->delete();
    }
}
