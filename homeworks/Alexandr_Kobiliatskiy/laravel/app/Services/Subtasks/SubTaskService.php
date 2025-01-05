<?php
namespace App\Services\Subtasks;

use App\Contracts\Services\Subtasks\SubTaskServiceInterface;
use App\Models\BaseModel;
use App\Models\Subtasks\Subtask;
use Illuminate\Support\Collection;

class SubTaskService implements SubTaskServiceInterface
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
        $subtask->taskId = $data['taskId'];
        $subtask->description = $data['description'];
        $subtask->dueDate = $data['dueDate'];
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
        $subtask->taskId = $data['taskId'];
        $subtask->description = $data['description'];
        $subtask->dueDate = $data['dueDate'];
        $subtask->save();
        return $subtask;
    }

    public function delete(int $id): bool
    {
        /**
         * @var Subtask $subtask
         */

        $subtask = Subtask::find($id);
        return $subtask->delete();

    }
}
