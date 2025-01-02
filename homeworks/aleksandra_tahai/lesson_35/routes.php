<?php

use Controllers\HomeController;
use Controllers\Api\TaskController;

return $routes = [

    '/api/tasks' => [
        'controller' => TaskController::class,
        'method' => 'getAll',
        'httpMethod' => 'GET',
    ],

    '/api/task' => [
        'controller' => TaskController::class,
        'method' => 'create',
        'httpMethod' => 'POST',
    ],

    '/api/task/{id}' => [
        'controller' => TaskController::class,
        'method' => 'get',
        'httpMethod' => 'GET',
        'regex' => '#/api/task/([0-9]+)#',
    ],

    '/' => [
        'controller' => HomeController::class,
        'method' => 'index',
        'httpMethod' => 'GET',
    ],
    '/update' => [
        'controller' => HomeController::class,
        'method' => 'update',
        'httpMethod' => 'POST',
    ],
    '/create' => [
        'controller' => HomeController::class,
        'method' => 'createView',
        'httpMethod' => 'POST',
    ],
    '/create/task' => [
        'controller' => HomeController::class,
        'method' => 'create',
        'httpMethod' => 'POST',
    ]
];