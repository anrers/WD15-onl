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
                'id' => $task->id,
                'name' => $task->name,
                'status' => $task->status,
                'dueDate' => $task->dueDate->format('d.m.Y H:i:s'),
            ];
        };
        
        $json = json_encode($data);

        return $json;
    }
}