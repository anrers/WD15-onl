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
    ) {
    }

    /**
     * @return array<TaskModel>
     */
    public function getAll(): array
    {
        $result = [];
        $dbResult = $this->db->connection()->query("SELECT * FROM tasks ORDER BY id DESC");
        while ($row = $dbResult->fetch()) {
            $result[] = new TaskModel(
                id: $row["id"],
                name: $row["name"],
                status: $row["status"],
                dueDate: new DateTime($row["dueDate"]),
                createdAt: new DateTime($row["createdAt"]),
                description: $row["description"],
                executedAt: new DateTime($row["executedAt"])
            );
        }

        return $result;
    }

    public function create(TaskModel $task): int
    {
    }




    /**
     * @throws Exception
     */
    public function getById(int $id): TaskModel
    {
        $dbResult = $this->db->connection()->query("SELECT * FROM tasks where id = $id ORDER BY id DESC");
        $row = $dbResult->fetch();

            return new TaskModel(
                id: $row["id"],
                name: $row["name"],
                status: $row["status"],
                dueDate: new DateTime($row["dueDate"]),
                createdAt: new DateTime($row["createdAt"]),
                description: $row["description"],
                executedAt: new DateTime($row["executedAt"])
            );
    }
}