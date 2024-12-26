<?php

namespace Controllers\Api;

use Model\Database;
use Exception;
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

        try {
            $task = $repository->getById($id);
            $view = new TaskJsonView();
        
            return $view->form($task);
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function create() 
    {
        $jsonString = file_get_contents('php://input');
        $jsonArray = json_decode($jsonString, true);

        $db = new Database();
        $repository = new TaskRepository($db);

        try {
            $taskId = $repository->create($jsonArray);

            return $taskId;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}