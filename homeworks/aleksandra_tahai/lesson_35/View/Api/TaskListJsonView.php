<?php

namespace View\Api;

use Model\Models\TaskModel;

class TaskListJsonView
{
    /**
     * @param array<TaskModel> $tasks
     * @return string
     */
    public function form(array $tasks): string
    {
        header('Content-type: application/json');
        $data=[];
        foreach ($tasks as $task) {
            $data[]=['id'=>$task->getId(),'name'=>$task->getName(),'dueDate'=>$task->getDueDate()->format('d-m-Y')];
        }
        $data = json_encode($data);
        return $data;
    }
}