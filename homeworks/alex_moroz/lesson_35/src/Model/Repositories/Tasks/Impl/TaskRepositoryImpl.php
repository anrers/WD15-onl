<?php

namespace Morozav\Lesson35\Model\Repositories\Tasks\Impl;

use Morozav\Lesson35\Model\Repositories\DatabaseConnection;
use Morozav\Lesson35\Model\Models\TaskModel;
use Morozav\Lesson35\Model\Repositories\Tasks\TaskRepository;
use PDOException;

class TaskRepositoryImpl implements TaskRepository
{
    public function __construct() {}

    /**
     * @return array<{@link TaskModel}>
     */
    public function getAll(): array
    {
        $query = "SELECT * FROM tasks ORDER BY status, deadline";
        $connection = DatabaseConnection::getConnection()->connect();
        $statement = $connection->prepare($query);
        $statement->execute();
        $result = [];
        while ($task = $statement->fetchObject(TaskModel::class)) {
            $result[] = $task;
        }
        return $result;
    }

    public function getById(int $id): ?TaskModel
    {
        $query = "SELECT * FROM tasks WHERE id= ?";
        $connection = DatabaseConnection::getConnection()->connect();
        $statement = $connection->prepare($query);
        $statement->execute([$id]);
        return $statement->fetchObject(TaskModel::class);
    }

    public function update(array $taskData): bool
    {
        $query = "UPDATE tasks SET name = :name, description = :description WHERE id = :id";
        $connection = DatabaseConnection::getConnection()->connect();

        if (isset($taskData['deadline'])) {
            $index = strrpos($query, ":description") + mb_strlen(":description");
            $str_to_insert = ", deadline = :deadline";
            $query = substr_replace($query, $str_to_insert, $index, 0);
        }

        try {
            $statement = $connection->prepare($query);
            $statement->execute($taskData);
            return true;
        } catch (PDOException $exception) {
            return false;
        }
    }

    public function create(array $newTaskData): bool
    {
        $query = "INSERT INTO tasks (name, description, deadline) VALUES (?, ?, ?)";
        $connection = DatabaseConnection::getConnection()->connect();
        $statement = $connection->prepare($query);
        try {
            $statement->execute([
                    $newTaskData['name'],
                    $newTaskData['description'],
                    $newTaskData['deadline'],
                ],
            );
            return true;
        } catch (PDOException $exception) {
            return false;
        }
    }

    public function resolve(int $id): void
    {
        $query = "UPDATE tasks SET status = 1, executedAt = now() WHERE id = ?";
        $connection = DatabaseConnection::getConnection()->connect();
        $statement = $connection->prepare($query);
        $statement->execute([$id]);
    }

}