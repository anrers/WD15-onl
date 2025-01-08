<?php

namespace App\Services\Tasks;

use App\Contracts\Services\AbstractEntityService;
use App\Contracts\Services\Tasks\SubtaskServiceInterface;
use App\Models\Tasks\Subtask;
use Illuminate\Support\Collection;

class SubtaskService extends AbstractEntityService implements SubtaskServiceInterface
{
    function getModelClass(): string
    {
        return Subtask::class;
    }

    public function getById(int $id): ?Subtask
    {
        return $this->builder()->find($id);
    }

    public function getAllByTaskId(int $taskId): Collection
    {
        return $this->builder()->where('taskId', '=', $taskId)->get();
    }


    public function create(array $data): ?Subtask
    {
        $subtask = new Subtask();
        $subtask->name = $data['name'];
        $subtask->taskId = $data['taskId'];

        $subtask->save();

        return $subtask;
    }

    public function update(int $id, array $data): ?Subtask
    {
        /**
         * @var Subtask $subtask
         */
        $subtask = $this->builder()->find($id);

        $subtask->name = $data['name'];
        //$subtask->taskId = $data['taskId'];

        $subtask->save();

        return $subtask;
    }

    public function delete(int $id): bool
    {
        /**
         * @var Subtask $subtask
         */
        $subtask = $this->builder()->find($id);
        return $subtask->delete();
    }
}
