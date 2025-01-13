<?php

error_reporting(E_ERROR);

require_once 'vendor/autoload.php';

if (preg_match(
    '/\.(?:png|jpg|jpeg|gif|js|css)$/',
    $_SERVER["REQUEST_URI"]
)) {
    return false;    // сервер возвращает файлы напрямую.
}
$url = $_SERVER["REQUEST_URI"];

$routes = require_once 'routes.php';

$router = new Router();
$route = $router->parse($routes, $url, $_SERVER["REQUEST_METHOD"]);


if (!$route) {
    http_response_code(404);
    die();
}

$controller = new $route['controller']();
if (!empty($route['args'])) {
    $response = $controller->{$route['method']}(...$route['args']);
} else {
    $response = $controller->{$route['method']}();
}


echo $response;

