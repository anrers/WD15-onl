<?php

namespace View\Api;

use Model\Models\TaskModel;

class TaskListJsonView
{
    /**
     * @param array<TaskModel> $tasks
     *
     * @return string
     */
    public function form(array $tasks): string
    {
        header('Content-type: application/json');

        $data = [];

        foreach ($tasks as $task) {
            $data[] = [
                'ID' => $task->id,
                'Name' => $task->name,
                'Status' => $task->status,
                'dueDate' => $task->dueDate->format('Y-m-d'),
            ];
        }


        return json_encode($data);
    }
}