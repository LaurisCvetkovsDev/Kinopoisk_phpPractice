<?php
namespace App\Kernel\Router;

use App\Kernel\Http\Redirect;
use App\Kernel\Http\Request;
use App\Kernel\Session\Session;
use App\Kernel\View\View;
class Router
{
    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];
    public function __construct(

        private View $view,
        private Request $request,
        private Redirect $redirect,
        private Session $session,
    ) {
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

            $controller->setView($this->view);
            $controller->setrequest($this->request);
            $controller->setRedirect($this->redirect);
            $controller->setSession($this->session);
            call_user_func(callback: [$controller, $action]);
        } else {
            call_user_func($route->getAction());
        }
    }
    private function notFound()
    {
        echo '<H1>no bitches</H1>';
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
        foreach ($routes as $route) {
            $this->routes[$route->getMethod()][$route->getUri()] = $route;
        }
    }
    private function getRoutes()
    {
        return require_once APP_PATH . '/config/routes.php';
    }
}