<?php

//Этот код помогает нам удобнее переадрисововать пользователя на фронт.
//А в контроллере оставить только логику

namespace App\Kernel\View;

use App\Kernel\Exceptions\ComponentNotFoundException;
use App\Kernel\Exceptions\ViewNotFoundException;

class View
{
    public function page($name)
    {



        $viewPath = APP_PATH . "/views/pages/$name.php";

        extract([
            'view' => $this
        ]);

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



        include_once APP_PATH . "/views/components/$name.php";

    }
}
