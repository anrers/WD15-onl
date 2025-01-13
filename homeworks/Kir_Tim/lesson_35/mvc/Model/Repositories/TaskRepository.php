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

    /**
     * @param TaskModel $newTask
     * @return bool
     */
    public function create(TaskModel $newTask): bool
    {
        $dueDate = $newTask->dueDate->format('d-m-Y-H-i-s');
        $createdAt = $newTask->createdAt->format('d-m-Y-H-i-s');
        $executedAt = $newTask->executedAt->format('d-m-Y-H-i-s');
        $dbResult = $this->db->connection()->prepare("INSERT INTO `tasks` ('id','name', 'dueDate', 'description', 'status', 'createdAt','executedAt')
                        VALUES (?,?,?,?,?,?,?)");
        return $dbResult->execute([$newTask->id, $newTask->name, $newTask->description, $dueDate, $executedAt, $newTask->status, $createdAt]);
    }

    public function update(int $UpdatedId): void
    {
        $dbResult = $this->db->connection()->prepare("UPDATE `tasks` SET `status` = 1 WHERE `id` = ?");
        $dbResult->execute([$UpdatedId]);

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