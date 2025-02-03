<?php

namespace Controllers;

use Model\Database;
use Model\Repositories\TaskRepository;
use View\TaskListView;
use View\CreateTaskView;
use Model\Models\TaskModel;
use DateTime;

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

    public function create(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $post = $_POST;

            if (empty($post['name']) || empty($post['dueDate'])) {
                http_response_code(400);
                return "Название и срок обязательны!";
            }

            $db = new Database();
            $repository = new TaskRepository($db);

            $task = new TaskModel(
                id: null,
                name: $post['name'],
                description: $post['description'] ?? null,
                status: 0,
                dueDate: new DateTime($post['dueDate']),
                createdAt: new DateTime(),
                executedAt: null
            );

            $repository->create($task);
            header('Location: /');
            exit;
        }

        return (new CreateTaskView())->render();
    }

    public function update(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['id'])) {
            http_response_code(400);
            echo 'Ошибка запроса';
            return;
        }

        $db = new Database();
        $repository = new TaskRepository($db);

        $taskId = (int)$_POST['id'];

        try {
            $task = $repository->getById($taskId);
        } catch (Exception) {
            http_response_code(404);
            echo 'Задача не найдена';
            return;
        }

        // Меняем статус на "выполнено" и ставим время выполнения
        $task->status = 1;
        $task->executedAt = new \DateTime();

        $repository->update($task);

        header('Location: /');
        exit;
    }
}
