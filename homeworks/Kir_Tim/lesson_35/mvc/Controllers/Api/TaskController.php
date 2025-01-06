<?php

namespace Controllers\Api;

use DateTime;
use Model\Database;
use Model\Models\TaskModel;
use Model\Repositories\TaskRepository;
use View\Api\TaskListJsonView;
use View\Api\TaskJsonView;
use View\NewTaskView;
use View\TaskView;

/**
 * @method createTask()
 */
class TaskController
{
    public function getAll(): string
    {
        $db = new Database();
        $repository = new TaskRepository($db);


        $tasks = $repository->getAll();
        return (new TaskView())->render('list', $tasks);
//        $view = new TaskListJsonView();
//        return $view ->form($tasks);

    }

    public function get(int $id): string
    {
        $db = new Database();
        $repository = new TaskRepository($db);


        $task = $repository->getById($id);

        $view = new TaskJsonView();
        return $view->form($task);
    }

    public function create(): string
    {
        return (new NewTaskView())->render('new', null);
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function createNewTask(): bool
    {
        $newTask = new TaskModel(
            id: null,
            createdAt: new DateTime(),
            executedAt: new DateTime(),
            status: '0',
            name: $_POST['name'],
            dueDate: new DateTime($_POST['date']),
            description: $_POST['description'],
        );

        $db = new Database();
        $repository = new TaskRepository($db);
        header("Location: /api/tasks");
        return $repository->create($newTask);
    }

    public function updateTask(): void
    {
        $db = new Database();
        $repository = new TaskRepository($db);
        $UpdatedId = key($_POST);
        $repository->update($UpdatedId);
        header("Location: /api/tasks");
    }
}