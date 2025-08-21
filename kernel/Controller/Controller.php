<?php

//Этот класс был создан для того что бы разгрушить контроллер
//в котором мы не хотим создовать новый обьект класса view
// а просто исспользлвать функцию что сразу сделает все необходимое

namespace App\Kernel\Controller;

use App\Kernel\View\View;

abstract class Controller
{
    private View $view;

    public function view($name)
    {
        $this->view->page($name);
    }


    public function setView(View $view)
    {
        $this->view = $view;
    }

}