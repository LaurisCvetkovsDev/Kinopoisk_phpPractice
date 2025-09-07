<?php

//Этот класс был создан для того что бы разгрушить контроллер
//в котором мы не хотим создовать новый обьект класса view
// а просто исспользлвать функцию что сразу сделает все необходимое

namespace App\Kernel\Controller;

use App\Kernel\Auth\AuthInterface;
use App\Kernel\Database\DatabaseInterface;
use App\Kernel\Http\RedirectInterface;
use App\Kernel\Http\RequestInterface;
use App\Kernel\Session\SessionInterface;
use App\Kernel\storage\StorageInterface;
use App\Kernel\View\View;
use App\Kernel\View\ViewInterface;

abstract class Controller
{
    private ViewInterface $view;
    private RequestInterface $request;
    private RedirectInterface $redirect;
    private SessionInterface $session;
    private DatabaseInterface $databse;
    private AuthInterface $auth;
    private StorageInterface $storage;

    public function view($name)
    {
        $this->view->page($name);
    }
    public function db()
    {
        return $this->databse;
    }
    public function setDatabase($database)
    {
        $this->databse = $database;
    }


    public function setView(View $view)
    {
        $this->view = $view;
    }

    public function request()
    {
        return $this->request;
    }


    public function setrequest($request)
    {
        $this->request = $request;
    }
    public function setRedirect($redirect)
    {
        $this->redirect = $redirect;
    }

    public function redirect($url)
    {
        $this->redirect->to($url);
    }
    public function session()
    {
        return $this->session;
    }
    public function setSession($session)
    {
        $this->session = $session;
    }
    public function auth()
    {
        return $this->auth;
    }
    public function setAuth($auth)
    {
        $this->auth = $auth;
    }
    public function setStorage($storage)
    {
        $this->storage = $storage;
    }
    public function storage()
    {
        return $this->storage;
    }

}