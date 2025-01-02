<?php
require_once "vendor/autoload.php";

if (preg_match('/\.(?:png|jpg|jpeg|gif|ico|css|js)$/', $_SERVER["REQUEST_URI"])) {
    return false;    // сервер возвращает файлы напрямую.
}


$ulr = $_SERVER['REQUEST_URI'];

$routes = require_once "routes.php";
$router = new Router();

$route = $router->parse($routes, $ulr, $_SERVER['REQUEST_METHOD']);


if (empty($route)) {
    http_response_code(404);
    die();
}

$controller = new $route['controller']();
$response = $controller->{$route['method']}(...$route['args']);
echo $response;