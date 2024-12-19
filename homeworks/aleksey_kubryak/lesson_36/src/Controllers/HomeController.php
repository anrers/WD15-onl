<?php

namespace Controllers;

use Datetime;
use Exception;
use Model\Database;
use Model\Models\TaskModel;
use Model\Repositories\TaskRepository;
use View\TaskListView;
use View\CreateTaskView;
use View\UpdateTaskView;

class HomeController
{
    public function index(): string
    {
        $db = new Database();
        $repository = new TaskRepository($db);

        $tasks = $repository->getAll();
        
        $view = new TaskListView();
        return $view->render($tasks);
    }

    public function createView(): string
    {
        $view = new CreateTaskView();
        return $view->render();
    }

    public function create()
    {
        if (empty($_POST['name']) || empty($_POST['dueDate'])) {
            die('Name and due date are required');
        }

        $db = new Database();
        $repository = new TaskRepository($db);
    
        $name = $_POST['name'];
        $description = $_POST['description'];
        $dueDate = new DateTime($_POST['dueDate']);
        $createdAt = new DateTime();
    
        $task = new TaskModel(
            id: null,
            name: $name,
            status: 0,
            dueDate: $dueDate,
            createdAt: $createdAt,
            description: $description,
            executedAt: null
        );
        
        try {
            $repository->create($task);
        
            header('Location: /');
            exit();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    
    public function updateView(int $id): string
    {
        $db = new Database();
        $repository = new TaskRepository($db);

        try {
            $task = $repository->getById($id);
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }

        $view = new UpdateTaskView();
        return $view->render(['task' => $task]);
    }

    public function update()
    {
        if (empty($_POST['id']) || empty($_POST['name']) || empty($_POST['dueDate'])) {
            die('ID, name, and due date are required');
        }

        $db = new Database();
        $repository = new TaskRepository($db);

        $id = (int)$_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $dueDate = new DateTime($_POST['dueDate']);
        $status = (int)$_POST['status'];

        try {
            $task = $repository->getById($id);
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }

        $task->name = $name;
        $task->description = $description;
        $task->dueDate = $dueDate;
        $task->status = $status;

        try {
            $repository->update($task);
            header('Location: /');
            exit();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}