<?php

namespace Controllers;

use Model\Database;
use Model\Repositories\TaskRepository;
use DateTime;

class ApiController
{
    public function getTasks(): void
    {
        header('Content-Type: application/json');

        $db = new Database();
        $repository = new TaskRepository($db);
        $tasks = $repository->getAll();

        echo json_encode(array_map(fn($task) => [
            'id' => $task->id,
            'name' => $task->name,
            'description' => $task->description,
            'status' => $task->status,
            'dueDate' => $task->dueDate->format('Y-m-d H:i:s'),
            'createdAt' => $task->createdAt->format('Y-m-d H:i:s'),
            'executedAt' => $task->executedAt?->format('Y-m-d H:i:s'),
        ], $tasks));
        exit;
    }

    public function updateTask(): void
    {
        header('Content-Type: application/json');
        $data = json_decode(file_get_contents('php://input'), true);

        if (empty($data['id'])) {
            http_response_code(400);
            echo json_encode(['error' => 'ID задачи обязателен']);
            return;
        }

        $db = new Database();
        $repository = new TaskRepository($db);
        $task = $repository->getById((int)$data['id']);

        $task->status = $data['status'] ?? 1;
        $task->executedAt = new DateTime();

        $repository->update($task);
        echo json_encode(['success' => true]);
        exit;
    }
}
