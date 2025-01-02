<?php

namespace Controllers\Api;

use Model\Database;
use Model\Repositories\TaskRepository;
use View\Api\TaskJsonView;
use View\Api\TaskListJsonView;

class TaskController
{
    public function getAll()
    {
        $db = new Database();
        $repository = new TaskRepository($db);
        $tasks = $repository->getAll();
        $view = new TaskListJsonView();
        return $view->form($tasks);
    }

    public function get(int $id){
        $db = new Database();
        $repository = new TaskRepository($db);
        $task = $repository->getById($id);
        $view = new TaskJsonView();
        return $view->form($task);

    }

    public function create(){
        $db = new Database();
        $repository = new TaskRepository($db);


    }
}