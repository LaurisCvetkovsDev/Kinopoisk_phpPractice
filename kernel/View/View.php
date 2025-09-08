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
    public function page($name, $data = [])
    {
        $viewPath = APP_PATH . "/views/pages/$name.php";
        extract(array_merge($this->defaultData(), $data));
        if (!file_exists($viewPath)) {
            throw new ViewNotFoundException("View $name not found!");
        }
        require_once $viewPath;
    }
    public function component($name, $data = [])
    {
        $componentPath = APP_PATH . "/views/components/$name.php";
        if (!file_exists($componentPath)) {
            throw new ComponentNotFoundException("Component $name not found!");
        }
        extract(array_merge($this->defaultData(), $data));
        include APP_PATH . "/views/components/$name.php"; // <-- вместо include_once
    }
    public function defaultData()
    {
        return [
            'view' => $this,
            'session' => $this->session,
            'auth' => $this->auth,
        ];
    }
    public function title()
    {
        return 'balls';
    }
}
