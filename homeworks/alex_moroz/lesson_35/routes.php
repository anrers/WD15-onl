<?php

use Morozav\Lesson35\Controllers\TaskController;

return [
    "GET"  => [
        "/tasks"     => [
            'controller' => TaskController::class,
            'method'     => 'getAll',
        ],
        "/task/{id}" => [
            'controller' => TaskController::class,
            'method'     => 'resolve',
            'regexp'     => '#/task/([0-9]+)#',
        ],
        "/task"      => [
            'controller' => TaskController::class,
            'method'     => 'createNewTaskView',
        ],
    ],
    "POST" => [
        "/task"      => [
            'controller' => TaskController::class,
            'method'     => 'create',
        ],
        "/task/{id}" => [
            'controller' => TaskController::class,
            'method'     => 'update',
            'regexp'     => '#/task/([0-9]+)#',
        ],
    ],
];