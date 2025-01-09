<?php

class Router
{
    public function parse(array $routes, string $url, string $method): array
    {
        $url = rtrim($url, '/');

        foreach ($routes as $routeUrl => $routeData) {
            if ($routeData['httpMethod'] != $method) {
                continue;
            }

            if (isset($routeData['regex'])) {
                $match = [];
                if (preg_match($routeData['regex'], $url, $match)) {
                    unset($match[0]);

                    return [
                        'controller' => $routeData['controller'],
                        'method' => $routeData['method'],
                        'args' => array_values($match),
                    ];
                }
            } else {
                if ($routeUrl == $url) {
                    return [
                        'controller' => $routeData['controller'],
                        'method' => $routeData['method'],
                        'args' => [],
                    ];
                }
            }
        }

        return [];
    }
}