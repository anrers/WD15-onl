<?php

namespace Model\Repositories;

use DateTime;
use Exception;
use Model\Database;
use Model\Models\TaskModel;
use PDO;

class TaskRepository
{

    public function __construct(
        protected Database $db
    ) {
    }

    /**
     * @return array<TaskModel>
     * @throws Exception
     */

    public function getAll(): array
    {
        $result = [];
        $dbResult = $this->db->connection()->query("SELECT * FROM tasks ORDER BY status, dueDate ASC ");
        while ($row = $dbResult->fetch()) {
            $result [] = new TaskModel(
                id: $row["id"],
                name: $row["name"],
                dueDate: new DateTime ($row["dueDate"]),
                status: $row["status"],
                createAt: new DateTime($row["createdAt"]),
                executedAt: new DateTime($row["executedAt"]),
                description: $row["description"],
            );
        }
        return $result;
    }

    public function getById(int $id): TaskModel
    {
        $result = [];
        $dbResult = $this->db->connection()->prepare("SELECT * FROM tasks WHERE id = :id ");
        $dbResult->bindParam(":id", $id, PDO::PARAM_INT);
        $dbResult->execute();
        $row = $dbResult->fetch();
        $result = new TaskModel(
            id: $row["id"],
            name: $row["name"],
            dueDate: new DateTime ($row["dueDate"]),
            status: $row["status"],
            createAt: new DateTime($row["createdAt"]),
            executedAt: new DateTime($row["executedAt"]),
            description: $row["description"],
        );
        return $result;
    }

    public function create(TaskModel $task): bool
    {
        try {
            $dbResult = $this->db->connection()->prepare('INSERT INTO tasks ( name, description, dueDate, status) VALUES ( :name, :description, :dueDate, :status)');
            $dbResult->execute([
                "name" => $task->getName(),
                "description" => $task->getDescription(),
                "dueDate" => $task->getDueDate()->format('Y-m-d H:i:s'),
                "status" => $task->getStatusInt(),
            ]);

            if ($dbResult) {
                return true;
            } else {
                throw new Exception("Ошибка выполнения запроса.");
            }

        } catch (Exception $error) {
            throw new Exception('Ошибка при создании задачи: ' . $error->getMessage());
        }
    }


    public function updateStatus(int $id): bool
    {

        try {
            $dbResult = $this->db->connection()->prepare('UPDATE tasks SET status = 1 WHERE id = :id');
            $dbResult->execute([':id' => $id]);

            if ($dbResult) {
                return true;
            } else {
                throw new Exception("Ошибка выполнения запроса.");
            }

        } catch (Exception $error) {
            throw new Exception('Ошибка при обновлении задачи: ' . $error->getMessage());
        }

    }

}

