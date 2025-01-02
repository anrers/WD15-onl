<?php

namespace View\Api;

use Model\Models\TaskModel;

class TaskJsonView{
    /**
     * @param TaskModel $task
     * @return string
     */
    public function form(TaskModel $task){
        header('Content-type: application/json');
        $data = [
            'id'=>$task->getId(),
            'name'=>$task->getName(),
            'dueDate'=>$task->getDueDate()->format('Y-m-d'),
        ];

        $data =json_encode($data);
        return $data;
    }
}