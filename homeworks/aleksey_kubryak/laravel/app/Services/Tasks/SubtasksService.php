<?php

namespace App\Services\Tasks;

use App\Contracts\Services\Tasks\SubtaskServiceInterface;
use App\Models\BaseModel;
use App\Models\Tasks\Subtask;
use Illuminate\Support\Collection;

class SubtasksService implements SubtaskServiceInterface
{
    public function getAll(): Collection
    {
        return Subtask::all();
    }

    public function getById(int $id): ?BaseModel
    {
        return Subtask::find($id);
    }

    public function create(array $data): ?BaseModel
    {
        $subtask = new Subtask();
        $subtask->name = $data['name'];
        $subtask->task_id = $data['task_id'];

        $subtask->save();

        return $subtask;
    }

    public function update(int $id, array $data): ?BaseModel
    {
        /**
         * @var Subtask $subtask
         */
        $subtask = Subtask::find($id);

        $subtask->name = $data['name'];
        $subtask->task_id = $data['task_id'];

        $subtask->save();

        return $subtask;
    }

    public function delete(int $id): bool
    {
        /**
         * @var Subtask $subtask
         */
        $subtask = Subtask::find($id);

        if ($subtask) {
            return $subtask->delete();
        }

        return false;
    }
}
