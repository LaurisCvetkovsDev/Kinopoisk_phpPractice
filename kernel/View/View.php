<?php

//Этот код помогает нам удобнее переадрисововать пользователя на фронт.
//А в контроллере оставить только логику

namespace App\Kernel\View;

use App\Kernel\Auth\AuthInterface;
use App\Kernel\Exceptions\ComponentNotFoundException;
use App\Kernel\Exceptions\ViewNotFoundException;
use App\Kernel\Session\SessionInterface;

class View implements ViewInterface
{
    public function __construct(
        private SessionInterface $session,
        private AuthInterface $auth,
    ) {
    }
    public function page($name)
    {
        $viewPath = APP_PATH . "/views/pages/$name.php";
        extract(array: $this->defaultData());
        if (!file_exists($viewPath)) {
            throw new ViewNotFoundException("View $name not found!");
        }
        require_once $viewPath;
    }
    public function component($name)
    {
        $componentPath = APP_PATH . "/views/components/$name.php";
        if (!file_exists($componentPath)) {
            throw new ComponentNotFoundException("Component $name not found!");
        }
        extract(array: $this->defaultData());
        include_once APP_PATH . "/views/components/$name.php";
    }
    public function defaultData()
    {
        return [
            'view' => $this,
            'session' => $this->session,
            'auth' => $this->auth,
        ];
    }
}
