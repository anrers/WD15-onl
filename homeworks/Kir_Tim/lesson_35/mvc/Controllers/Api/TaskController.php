<?php

namespace Controllers\Api;

use Model\Database;
use Model\Repositories\TaskRepository;
use View\Api\TaskListJsonView;
use View\Api\TaskJsonView;
use View\NewTaskView;
use View\TaskView;

class TaskController
{
    public function getAll()
    {
        $db = new Database();
        $repository  = new TaskRepository($db);


        $tasks = $repository->getAll();
        return (new TaskView())->render('list', $tasks);
//        $view = new TaskListJsonView();
//        return $view ->form($tasks);

    }

    public function get(int $id)
    {
        $db = new Database();
        $repository  = new TaskRepository($db);


        $task = $repository->getById($id);

        $view = new TaskJsonView();
        return $view ->form($task);

    }

    public function create(): string
    {
        return (new NewTaskView())->render('new', null);
    }


}