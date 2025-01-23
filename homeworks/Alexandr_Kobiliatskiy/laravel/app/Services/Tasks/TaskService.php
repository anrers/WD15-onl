<?php
namespace App\Services\Tasks;
use App\Contracts\Services\Tasks\TaskServiceInterface;
use App\Models\BaseModel;
use App\Models\Tasks\Task;
use Illuminate\Support\Collection;

class TaskService implements TaskServiceInterface
{

    public function getById(int $id): ?BaseModel
    {
        return Task::find($id);
    }

    public function getAll(): Collection
    {
        return Task::all();
    }

    public function create(array $data): ?BaseModel
    {
        $task = new Task();
        $task->name = $data['name'];
        $task->description = $data['description'];
        $task->dueDate = $data['dueDate'];
        $task->save();
        return $task;
    }

    public function update(int $id, array $data): ?BaseModel
    {
        /**
         * @var Task $task
         */
        $task = Task::find($id);
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

        $task = Task::find($id);
        return $task->delete();

    }


    public function changeStatus(int $id): ?BaseModel
    {
        /**
         * @var Task $task
         */
        $task = Task::find($id);
        $task->status = 1;
        $task->save();
        return $task;
    }

}
