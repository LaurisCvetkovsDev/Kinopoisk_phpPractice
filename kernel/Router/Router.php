<?php
namespace App\Kernel\Router;
class Router
{
    private array $routes = [
        'GET' => [],
        'PSOT' => [],
    ];
    public function __construct()
    {
        $this->initRoutes();
    }
    public function dispatch($uri, $method)
    {
        $route = $this->findRoute($uri, $method);
        if (!$route) {
            $this->notFound();
        }
        if (is_array($route->getAction())) {
            [$controller, $action] = $route->getAction();
            $controller = new $controller();
            call_user_func([$controller, $action]);
        } else {
            call_user_func($route->getAction());
        }
    }
    private function notFound()
    {
        echo '<H1>PAGE NOT FOUND</H1>';
        exit;
    }
    private function findRoute($uri, $method): Route|false
    {
        if (!isset($this->routes[$method][$uri])) {
            return false;
        }
        return $this->routes[$method][$uri];
    }
    private function initRoutes()
    {
        $routes = $this->getRoutes();
        dump($routes);
        foreach ($routes as $route) {
            $this->routes[$route->getMethod()][$route->getUri()] = $route;
        }
    }
    private function getRoutes()
    {
        return require_once APP_PATH . '/config/routes.php';
    }
}