<?php

namespace App\Services\Tasks;

use App\Contracts\Services\EntityServiceInterface;
use App\Models\BaseModel;
use App\Models\Tasks\Task;
use Ramsey\Collection\Collection;

class TaskService implements EntityServiceInterface
{

    public function getById(int $id): ?BaseModel
    {
        return Task::find($id);

    }

    public function getAll(): Collection
    {
        $data = Task::all();

        return view('tasks.list', compact('data'));
    }

    public function create(array $data): ?BaseModel
    {
        return view('tasks.create');
    }

    public function update(array $data, int $id): ?BaseModel
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id): bool
    {
        /**
         * @var Task $task
         */

        $task = Task::find($id);
        $task->delete();
    }
}
