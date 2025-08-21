<?php

namespace App;

use App\Http\Request;
use App\Router\Router;


class App
{
    public function run()
    {
        $request = Request::createFromGlobals();
        $router = new Router();
        $router->dispatch($request->uri(), $request->method());
    }
}