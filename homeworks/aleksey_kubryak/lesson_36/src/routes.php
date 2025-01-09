<?php

use Controllers\HomeController;
use Controllers\Api\TaskController;

return [
    '/' => [
        'controller' => HomeController::class,
        'method' => 'index',
        'httpMethod' => 'GET',
    ],
    '/create' => [
        'controller' => HomeController::class,
        'method' => 'createView',
        'httpMethod' => 'GET',
    ],
    '/create/task' => [
        'controller' => HomeController::class,
        'method' => 'create',
        'httpMethod' => 'POST',
    ],
    '/update' => [
        'controller' => HomeController::class,
        'method' => 'update',
        'httpMethod' => 'POST',
    ],
    '/update/{id}' => [
        'controller' => HomeController::class,
        'method' => 'updateView',
        'httpMethod' => 'GET',
        'regex' => '#^/update/([1-9][0-9]*)$#',
    ],
];