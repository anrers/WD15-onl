<?php

use Controllers\Api\TaskController;

return [
    '/api/tasks' => [
        'controller' => TaskController::class,
        'method' => 'getAll',
        'httpMethod' => 'GET',
    ],
    '/api/task/{id}' => [
        'controller' => TaskController::class,
        'method' => 'get',
        'httpMethod' => 'GET',
        'regex' => '#/api/task/([1-9]+)#'
    ],
    '/create' => [
        'controller' => TaskController::class,
        'method' => 'create',
        'httpMethod' => 'POST',
    ],
    '/update' => [
        'controller' => TaskController::class,
        'method' => 'updateTask',
        'httpMethod' => 'POST',
    ],
    '/create/task' => [
        'controller' => TaskController::class,
        'method' => 'createNewTask',
        'httpMethod' => 'POST',
    ],
];