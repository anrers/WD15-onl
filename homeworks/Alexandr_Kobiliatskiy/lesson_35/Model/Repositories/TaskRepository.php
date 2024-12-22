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
    ) {}

    /**
     * @return array<TaskModel>
     * @throws Exception
     */
    public function getAll(): array
    {
        $result = [];

        $dbResult = $this->db->connection()->query('SELECT * FROM tasks order by id');

        while ($row = $dbResult->fetch()) {
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

        $dueDate = $task->dueDate->format('Y-m-d');
        $createdAt = $task->createdAt->format('Y-m-d');
        $executedAt = $task->executedAt->format('Y-m-d');

        $connectForDb = $this->db->connection();

        $resultQuery = $connectForDb->prepare("INSERT INTO `tasks` (
                     `name`, `description`, `dueDate`, `status`, `createdAt`, `executedAt`)
                        VALUES (?, ?, ?, ?, ?, ?)");
        header("Location: /");
        return $resultQuery->execute([$task->name, $task->description, $dueDate, $task->status, $createdAt, $executedAt]);
    }

    public function update(int $idForUpdate): bool
    {
        $connectForDb = $this->db->connection();

        $resultQuery = $connectForDb->prepare("UPDATE `tasks` SET `status` = 1 WHERE `id` = ?");

        header("Location: /");
        return $resultQuery->execute([$idForUpdate]);
    }
}
