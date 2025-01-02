<?php

class Router
{

    public function parse(array $routes, string $url, string $method): array
    {

        $result = [];
//        $url = rtrim($url, "/");

        foreach ($routes as $routeUrl => $routeData) {
            if ($routeData['httpMethod'] != $method) {
                continue;
            }

            if (isset($routeData['regex'])) {
                $match = [];
                $isMatch = preg_match_all($routeData['regex'], $url, $match);
                if ($isMatch) {
                    unset($match[0]);
                    $result = [
                        'controller' => $routeData['controller'],
                        'method' => $routeData['method'],
                        'args' => array_merge(...$match),
                    ];

                    break;
                }
            } else {
                if ($routeUrl === $url) {
                    $result = [
                        'controller' => $routeData['controller'],
                        'method' => $routeData['method'],
                        'args' => []
                    ];
                    break;
                }
            }
        }
        return $result;
    }

}