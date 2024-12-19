<?php

class RouteParser
{
    public function parse(array $routes, string $url, string $httpMethod): array
    {
        $result = [];
        if (isset($routes[$httpMethod])) {
            $url = rtrim($url, "/");
            $routes = $routes[$httpMethod];
            foreach ($routes as $routeUrl => $routeData) {
                if (isset($routeData['regexp'])) {
                    $match = [];
                    $isMatch = preg_match_all($routeData['regexp'], $url, $match);

                    if ($isMatch) {
                        unset($match[0]);
                        $result = [
                            'controller' => $routeData['controller'],
                            'method'     => $routeData['method'],
                            'args'       => array_merge(...$match),
                        ];
                        break;
                    }
                } else {
                    if ($routeUrl == $url) {
                        $result = [
                            'controller' => $routeData['controller'],
                            'method'     => $routeData['method'],
                            'args'       => [],
                        ];
                        break;
                    }
                }
            }
        }

        return $result;
    }
}