<?php

class Router
{
    private $routes = [
        'GET' => [],
        'POST' => []
    ];

    public function get($uri, $action)
    {
        $this->routes['GET'][$uri] = $action;
    }

    public function post($uri, $action)
    {
        $this->routes['POST'][$uri] = $action;
    }

    public function dispatch($uri, $method)
    {
        $uri = parse_url($uri, PHP_URL_PATH);

        if (isset($this->routes[$method][$uri])) {
            $action = $this->routes[$method][$uri];
            $controllerName = $action[0];
            $methodName = $action[1];

            require_once __DIR__ . '/../app/controllers/' . $controllerName . '.php';

            $controller = new $controllerName();
            $controller->$methodName();
            return;
        }

        http_response_code(404);
        echo "<h1>404 - Not Found</h1>";
    }
}