<?php

namespace app\core;

use Exception;

class Router {
    private array $routeMap = [];

    public function get(string $url, $callback): void {
        $this->routeMap['get'][$url] = $callback;
    }

    public function post(string $url, $callback): void {
        $this->routeMap['post'][$url] = $callback;
    }

    /**
     * @throws Exception
     */
    public function handleRequest(Request $request, Response $response): void {
        $method = strtolower($request->getMethod());
        $path = $request->getPath();
        $callback = $this->matchRoute($method, $path);

        if (is_string($callback)) {
            list($controllerName, $methodName) = explode('@', $callback);
            $this->invokeController($controllerName, $methodName, $request, $response);
        } elseif (is_callable($callback)) {
            call_user_func($callback, $request, $response);
        } else {
            throw new Exception("Invalid route callback for: $path");
        }
    }

    /**
     * Match the incoming request with the registered routes.
     */
    private function matchRoute(string $method, string $path): mixed {
        foreach ($this->routeMap[$method] ?? [] as $route => $callback) {
            $pattern = preg_replace('/\{(\w+)\}/', '(?P<\1>[^/]+)', $route);
            $pattern = "#^$pattern$#";

            if (preg_match($pattern, $path, $matches)) {
                $_GET = array_merge($_GET, array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY));
                return $callback;
            }
        }
        throw new Exception("Route not found for URI: $path");
    }

    /**
     * Invoke a controller's method.
     * @throws Exception
     */
    private function invokeController(string $controllerName, string $methodName, Request $request, Response $response): void {
        $controllerFile = __DIR__ . '/../controllers/' . $controllerName . '.php';

        if (!file_exists($controllerFile)) {
            throw new Exception("Controller file $controllerFile not found.");
        }

        require_once $controllerFile;
        if (!class_exists($controllerName)) {
            throw new Exception("Controller class $controllerName not found.");
        }

        $controller = new $controllerName();

        if (!method_exists($controller, $methodName)) {
            throw new Exception("Method $methodName not found in controller $controllerName.");
        }

        $controller->$methodName($request, $response);
    }
}
