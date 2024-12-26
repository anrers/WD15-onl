<?php

error_reporting(E_ERROR);

require_once __DIR__ . '/../vendor/autoload.php';
require_once 'Router.php';

if (preg_match('/\.(?:png|jpg|jpeg|gif|ico|js|css)$/', $_SERVER["REQUEST_URI"])) {
    return false;
}

$url = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$routes = include 'routes.php';

$router = new Router();
$route = $router->parse($routes, $url, $method);

if (!$route) {
    http_response_code(404);
    echo "Страница не найдена";
    return false;
}

$controller = new $route['controller'];

if (!empty($route['args'])) {
    $response = $controller->{$route['method']}(...$route['args']);
} else {
    $response = $controller->{$route['method']}();
}

echo $response;