<?php

//Этот код помогает нам удобнее переадрисововать пользователя на фронт.
//А в контроллере оставить только логику

namespace App\Kernel\View;

class View
{
    public function page($name)
    {

        extract([
            'view' => $this
        ]);

        include_once APP_PATH . "/views/pages/$name.php";

    }

    public function component($name)
    {
        include_once APP_PATH . "/views/components/$name.php";

    }
}
