<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class LoginController extends Controller
{
    public function index()
    {
        $this->view('login');

    }
    public function login()
    {
        dump($this->auth());
    }


}