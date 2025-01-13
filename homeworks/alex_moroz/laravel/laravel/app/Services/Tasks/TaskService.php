<?php

namespace App\Services\Tasks;

use App\Contracts\Services\AbstractEntityService;
use App\Contracts\Services\Tasks\TaskServiceInterface;
use App\Models\Tasks\Task;
use Illuminate\Support\Collection;

class TaskService extends AbstractEntityService implements TaskServiceInterface
{
    function getModelClass(): string
    {
        return Task::class;
    }

    public function getById(int $id): ?Task
    {
        return $this->builder()->find($id);
    }

    public function create(array $data): ?Task
    {
        $task = new Task();
        $task->name = $data['name'];
        $task->description = $data['description'];
        $task->dueDate = $data['dueDate'];

        $task->save();

        return $task;
    }

    public function update(int $id, array $data): ?Task
    {
        /**
         * @var Task $task
         */
        $task = $this->builder()->find($id);

        $task->name = $data['name'];
        $task->description = $data['description'];
        $task->dueDate = $data['dueDate'];

        $task->save();

        return $task;
    }

    public function delete(int $id): bool
    {
        /**
         * @var Task $task
         */
        $task = $this->builder()->find($id);
        return $task->delete();
    }
}
