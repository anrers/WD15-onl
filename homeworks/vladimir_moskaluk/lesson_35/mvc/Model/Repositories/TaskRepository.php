<?php

namespace Model\Repositories;

use DateTime;
use Exception;
use Model\Database;
use Model\Models\TaskModel;


class TaskRepository
{
    public function __construct(
        protected Database $db
    ){
    }

    /**
     * @return array<TaskModel>
     * @throws Exception
    */

    public function getAll():array
    {
        $result = [];

        $dbResult = $this->db->connection()->query('SELECT * FROM tasks order by id');

        while($row = $dbResult->fetch()){
         $result[] = new TaskModel(
         id: $row['id'],
         name: $row['name'],
         status: $row['status'],
         dueDate: new DateTime($row['dueDate']),
         createdAt: new DateTime($row['createdAt']),
         description: $row['description'],
         executedAt: new DateTime($row['executedAt']),
         );
        }
        return$result;
    }

    public function create(TaskModel $task): int
    {
        $stmt = $this->db->connection()->prepare("
        INSERT INTO tasks (name, description, status, dueDate, createdAt) 
        VALUES (:name, :description, :status, :dueDate, :createdAt)
    ");

        $stmt->execute([
            'name' => $task->name,
            'description' => $task->description,
            'status' => $task->status,
            'dueDate' => $task->dueDate->format('Y-m-d H:i:s'),
            'createdAt' => $task->createdAt->format('Y-m-d H:i:s'),
        ]);

        return (int)$this->db->connection()->lastInsertId();
    }

    public function update(TaskModel $task): bool
    {
        $query = $this->db->connection()->prepare("
        UPDATE tasks SET status = :status, executedAt = :executedAt WHERE id = :id
    ");

        return $query->execute([
            'id' => $task->id,
            'status' => $task->status,
            'executedAt' => $task->executedAt?->format('Y-m-d H:i:s')
        ]);
    }

    public function getById(int $id): TaskModel
    {
        $stmt = $this->db->connection()->prepare("SELECT * FROM tasks WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();

        return new TaskModel(
            id: $row['id'],
            name: $row['name'],
            status: $row['status'],
            dueDate: new DateTime($row['dueDate']),
            createdAt: new DateTime($row['createdAt']),
            description: $row['description'],
            executedAt: $row['executedAt'] ? new DateTime($row['executedAt']) : null,
        );
    }
}