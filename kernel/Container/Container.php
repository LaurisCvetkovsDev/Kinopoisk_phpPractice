<?php

//Это совего рода контейнер сервисов, который помогает разгрузить App.php.
//До создания этого фала все эти сервисы обьевлялись в App.php


namespace App\Kernel\Container;

use App\Kernel\Http\Request;
use App\Kernel\Router\Router;
class Container
{
    public function __construct()
    {
        $this->registerServices();
    }


    public readonly Request $request;
    public readonly Router $router;


    private function registerServices()
    {

        $this->request = Request::createFromGlobals();
        $this->router = new Router();

    }
}