<?php

namespace App\Contracts\Services\Tasks;

use App\Contracts\Services\EntityServiceInterface;
use App\Models\Tasks\Task;

interface TaskServiceInterface extends EntityServiceInterface
{
    public function changeStatus(int $id);

    public function increasePoints(Task $task);
}
