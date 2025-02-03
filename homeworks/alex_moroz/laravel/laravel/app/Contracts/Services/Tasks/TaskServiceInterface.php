<?php

namespace App\Contracts\Services\Tasks;

use App\Contracts\Services\EntityServiceInterface;
use App\Models\Tasks\Task;

interface TaskServiceInterface extends EntityServiceInterface
{
    public function complete(int $id): void;

    public function increasePoints(Task $task): void;

    public function updateTasksWithEmptySlug(): void;

    public function attachImages(Task $task, array $images): void;

    public function deleteImages(Task $task): void;
}
