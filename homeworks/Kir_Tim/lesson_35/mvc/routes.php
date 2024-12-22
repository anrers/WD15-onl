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
        'UserController' => TaskController::class,
        'method' => 'create',
        'httpMethod' => 'GET',
    ],
    '/update' => [
        'UserController' => TaskController::class,
        'method' => 'updateTask',
        'httpMethod' => 'POST',
    ],
    '/create/task' => [
        'UserController' => TaskController::class,
        'method' => 'create',
        'httpMethod' => 'POST',
    ],
];