<?php

namespace Model\Repositories;

use DateTime;
use Exception;
use Model\Database;
use Model\Models\TaskModel;


class TaskRepository
{
    public function __construct(
        protected Database $db,
    ) {
    }

    /**
     * @return array<TaskModel>
     * @trows Exception
     */

    public function getAll(): array
    {
        $result = [];

        $dbResult = $this->db->connection()->query('SELECT * FROM tasks ORDER BY id');

        while($row = $dbResult->fetch()) {
            $result[] = new TaskModel(
                id: $row['id'],
                name: $row['name'],
                status: $row['status'],
                dueDate: new DateTime($row['dueDate']),
                createdAt: new DateTime($row['createdAt']),
                description: $row['description'],
                executedAt: new DateTime($row['executedAt'])
            );
        }

        return $result;
    }

    public function create(TaskModel $task): int
    {
        $sql = "INSERT INTO tasks (name, status, dueDate, createdAt, description, executedAt) 
                VALUES (:name, :status, :dueDate, :createdAt, :description, :executedAt)";
    
        $stmt = $this->db->connection()->prepare($sql);
    
        $stmt->execute([
            ':name' => $task->name,
            ':status' => $task->status,
            ':dueDate' => $task->dueDate->format('Y-m-d H:i:s'),
            ':createdAt' => $task->createdAt->format('Y-m-d H:i:s'),
            ':description' => $task->description,
            ':executedAt' => $task->executedAt->format('Y-m-d H:i:s')
        ]);
    
        return (int)$this->db->connection()->lastInsertId();
    }

    public function update(TaskModel $task): bool
    {
        $sql = "UPDATE tasks 
                SET name = :name, 
                    status = :status, 
                    dueDate = :dueDate, 
                    createdAt = :createdAt, 
                    description = :description, 
                    executedAt = :executedAt 
                WHERE id = :id";

        $stmt = $this->db->connection()->prepare($sql);

        return $stmt->execute([
            ':id' => $task->id,
            ':name' => $task->name,
            ':status' => $task->status,
            ':dueDate' => $task->dueDate->format('Y-m-d H:i:s'),
            ':createdAt' => $task->createdAt->format('Y-m-d H:i:s'),
            ':description' => $task->description,
            ':executedAt' => $task->executedAt->format('Y-m-d H:i:s')
        ]);
    }

    public function getById(int $id): TaskModel
    {
        $sql = "SELECT * FROM tasks WHERE id = :id";

        $stmt = $this->db->connection()->prepare($sql);
        $stmt->execute([':id' => $id]);

        $row = $stmt->fetch();

        if (!$row) {
            throw new Exception("Task with ID $id not found");
        }

        return new TaskModel(
            id: $row['id'],
            name: $row['name'],
            status: $row['status'],
            dueDate: new DateTime($row['dueDate']),
            createdAt: new DateTime($row['createdAt']),
            description: $row['description'],
            executedAt: new DateTime($row['executedAt'])
        );
    }
}