<?php

namespace App\Services\Tasks;

use App\Contracts\Services\Tasks\TaskServiceInterface;
use App\Models\BaseModel;
use App\Models\Tasks\Task;
use Illuminate\Support\Collection;

class TasksService implements TaskServiceInterface
{
    public function getAll(): Collection
    {
        return Task::all();
    }

    public function getById(int $id): ?BaseModel
    {
        return Task::find($id);
    }

    public function create(array $data): ?BaseModel
    {
        $task = new Task();
        $task->name = $data['name'];
        $task->description = $data['description'];
        $task->dueDate = $data['dueDate'];
        $task->status = $data['status'] ?? false;

        $task->save();

        return $task;
    }

    public function update(int $id, array $data): ?BaseModel
    {
        /**
         * @var Task $task
         */
        $task = Task::find($id);

        $task->name = $data['name'] ?? $task->name;
        $task->description = $data['description'] ?? $task->description;
        $task->dueDate = $data['dueDate'] ?? $task->dueDate;
        $task->status = $data['status'] ?? $task->status;

        $task->save();

        return $task;
    }

    public function delete(int $id): bool
    {
        /**
         * @var Task $task
         */
        $task = Task::find($id);

        if (!$task) {
            return false;
        }

        return $task->delete();
    }
}
