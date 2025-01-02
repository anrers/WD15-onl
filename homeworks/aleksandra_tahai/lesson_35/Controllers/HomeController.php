<?php

namespace Controllers;

use Model\Database;
use Model\Models\TaskModel;
use Model\Repositories\TaskRepository;
use View\CreateTaskView;
use View\TaskListView;

class HomeController
{
    public function index()
    {
        $db = new Database();
        $repository = new TaskRepository($db);
        $tasks = $repository->getAll();
        $view = new TaskListView();

        return $view->render($tasks);
    }

    public function create()
    {
        $currentDate = date('Y-m-d');
        $post = $_POST;

        if ($post['taskDueDate'] < $currentDate) {
            header('Location: /');
            return '';
        } else {
            $task = new TaskModel(
                id: null,
                name: $post['taskName'],
                dueDate: new \DateTime($post['taskDueDate']),
                status: 0,
                createAt: new \DateTime(),
                description: $post['taskDescription']);

            $db = new Database();

            $repository = new TaskRepository($db);

            $newTask = $repository->create($task);
        }
        header('Location: /');
        return '';
    }

    public function createView()
    {
        $view = new CreateTaskView();
        return $view->render();
    }

    public function update()
    {
        $taskId = $_POST['taskId'];
        var_dump($taskId);
        $db = new Database();
        $repository = new TaskRepository($db);
        $task = $repository->updateStatus($taskId);
        header('Location: /');
        return '';

    }
}
