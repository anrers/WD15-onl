<?php
error_reporting(E_ERROR);

use Controllers\HomeController;

require_once 'vendor/autoload.php';

date_default_timezone_set('Europe/Moscow');

if (preg_match('/\.(?:png|jpg|jpeg|gif|ico)$/',
    $_SERVER["REQUEST_URI"]
)) {
    return false;
}

$url = $_SERVER["REQUEST_URI"];
$routes = [
    '/' => ['controller' => HomeController::class, 'method' => 'index'],
    '/create' => ['controller' => HomeController::class, 'method' => 'create'],
    '/update' => ['controller' => HomeController::class, 'method' => 'update'],
    '/api/tasks' => ['controller' => ApiController::class, 'method' => 'getTasks'],
    '/api/update' => ['controller' => ApiController::class, 'method' => 'updateTask'],
];

$route = $routes[$url];

if (!$route) {
    http_response_code(404);
}

$controller = new $route['controller']();
$response = $controller->{$route['method']}();

echo $response;

