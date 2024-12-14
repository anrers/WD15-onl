<?php

namespace Controllers;

use DateMalformedStringException;
use DateTime;
use Model\Database;
use Model\Models\TaskModel;
use Model\Repositories\TaskRepository;
use View\NewAddListView;
use View\TaskListView;

class HomeController
{
    /**
     * @throws /Exception
     */
    public function index(): string
    {
        $db = new Database();
        $repository = new TaskRepository($db);

        $tasks = $repository->getAll();

        $view = new TaskListView();

        return $view->render($tasks);
    }

    public function createViewNewTask(): string
    {
        $newTaskPage = new NewAddListView();
        return $newTaskPage->render();
    }

    /**
     * @throws DateMalformedStringException
     */
    public function createTask(): string
    {
        $newTask = new TaskModel(
            id: null,
            name: $_POST['name'],
            status: 0,
            dueDate: new DateTime($_POST['date']),
            createdAt: new DateTime(),
            description: $_POST['description'],
            executedAt: new DateTime()
        );
        $db = new Database();
        $repository = new TaskRepository($db);
        return $repository->create($newTask);
    }

    public function updateTasks(): bool
    {
        $db = new Database();
        $repository = new TaskRepository($db);
        $idForUpdate = intval(array_keys($_POST)[0]);
        return $repository->update($idForUpdate);

    }
}