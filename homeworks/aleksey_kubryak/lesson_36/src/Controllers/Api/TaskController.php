<?php

namespace Controllers\Api;

use Model\Database;
use Model\Repositories\TaskRepository;
use View\Api\TaskListJsonView;
use View\Api\TaskJsonView;

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

    public function get(int $id)
    {
        $db = new Database();
        $repository = new TaskRepository($db);

        $task = $repository->getById($id);

        $view = new TaskJsonView();
        
        return $view->form($task);
    }

    public function create() 
    {
        $jsonString = file_get_contents('php://input');
        $jsonArray = json_decode($jsonString, true);

        $db = new Database();
        $repository = new TaskRepository($db);

        $taskId = $repository->create($jsonArray);

        return $taskId;
    }
}