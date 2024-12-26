<?php

namespace app\Services\Tasks;

use app\Contracts\Services\Tasks\TaskServiceInterface;
use App\Models\Tasks\Task;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class TaskService implements TaskServiceInterface
{

    public function getById(int $id): ?Task
    {
        return $this->builder()->find($id);
    }

    public function getAll(): Collection
    {
        return $this->builder()->all();
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

    protected function builder(): Builder
    {
        return Task::query();
    }
}
