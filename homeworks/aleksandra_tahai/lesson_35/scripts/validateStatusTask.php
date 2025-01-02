<?php

/**
 * @var array<TaskModel> $tasks
 */

use Model\Models\TaskModel;
use Model\Database;

function validateStatusTask(array $tasks): void
{
    $dbResult = new Database()->connection();
    foreach ($tasks as $task) {
        if ($task->getDueDate()->formate("Y-m-d") < date("Y-m-d")) {
            $taskId = $task->getId();
            $dbResult->prepare('UPDATE tasks SET id = 2 WHERE id = :taskId')->execute(['taskId' => $taskId]);
        }
    }
}
