<?php

namespace App\Services\Tasks;

use App\Contracts\Services\Tags\TagServiceInterface;
use App\Contracts\Services\Tasks\SubtaskServiceInterface;
use App\Models\BaseModel;
use App\Models\Tasks\Subtask;
use Illuminate\Support\Collection;

class SubtaskService implements SubtaskServiceInterface
{

    public function getById(int $id): ?BaseModel
    {
        return Subtask::find($id);
    }

    public function getAll(): Collection
    {
        return Subtask::all();
    }

    public function create(array $data): ?BaseModel
    {
        $subtask = new Subtask();
        $subtask->name = $data['name'];
        $subtask->description = $data['description'];
        $subtask->taskId = $data['taskId'];
        $subtask->save();
        return $subtask;
    }

    public function update(int $id, array $data): ?BaseModel
    {
        $subtask = Subtask::find($id);
        $subtask->name = $data['name'];
        $subtask->description = $data['description'];
        $subtask->taskId = $data['taskId'];
        $subtask->save();
        return $subtask;
    }

    public function delete(int $id): bool
    {
        $subtask = Subtask::find($id);
        return $subtask->delete();
    }
}
