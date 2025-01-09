<?php

require_once 'RouteParser.php';
require_once 'vendor/autoload.php';

if (preg_match('/\.(?:png|jpg|jpeg|gif|ico|js|css)$/', $_SERVER["REQUEST_URI"]))
{
    return false;    // сервер возвращает файлы напрямую.
}

$url = $_SERVER["REQUEST_URI"];

$routes = require_once 'routes.php';

$routeParser = new RouteParser();
$route = $routeParser->parse($routes, $url, $_SERVER["REQUEST_METHOD"]);

if (!$route) {
    http_response_code(404);
    die();
}

$controller = new $route['controller'];
$response = $controller->{$route['method']}(...$route['args']);

echo $response;