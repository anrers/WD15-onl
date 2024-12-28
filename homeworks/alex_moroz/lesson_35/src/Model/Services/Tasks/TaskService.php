<?php

namespace Morozav\Lesson35\Model\Services\Tasks;

use Morozav\Lesson35\Model\Models\TaskModel;

interface TaskService
{
    public function getAll(): array;

    public function getById(int $id): ?TaskModel;

    public function resolve(int $id): void;

    public function create(array $newTaskData): bool;

    public function update(array $taskData): bool;
}