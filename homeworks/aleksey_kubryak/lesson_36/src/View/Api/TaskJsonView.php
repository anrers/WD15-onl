<?php

namespace View\Api;

use Model\Models\TaskModel;

class TaskJsonView
{
    /**
     * @param TaskModel $task
     * 
     * @return string
     */
    public function form(TaskModel $task): string
    {
        header('Content-type: application/json');

        $data[] = [
            'id' => $task->id,
            'name' => $task->name,
            'status' => $task->status,
            'dueDate' => $task->dueDate->format('d.m.Y H:i:s'),
        ];
        
        $json = json_encode($data);

        return $json;
    }
}