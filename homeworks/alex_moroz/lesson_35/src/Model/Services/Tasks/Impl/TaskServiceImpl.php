<?php

namespace Morozav\Lesson35\Model\Services\Tasks\Impl;

use Morozav\Lesson35\Model\Models\TaskModel;
use Morozav\Lesson35\Model\Repositories\Tasks\TaskRepository;
use Morozav\Lesson35\Model\Services\Tasks\TaskService;

class TaskServiceImpl implements TaskService
{

    public function __construct(
        private TaskRepository $taskRepository,
    ) {}

    public function getAll(): array
    {
        return $this->taskRepository->getAll();
    }

    public function getById(int $id): ?TaskModel
    {
        return $this->taskRepository->getById($id);
    }

    public function resolve(int $id): void
    {
        $this->taskRepository->resolve($id);
    }

    public function create(array $newTaskData): bool
    {
        return $this->taskRepository->create($newTaskData);
    }

    public function update(array $taskData): bool
    {
        return $this->taskRepository->update($taskData);
    }

}