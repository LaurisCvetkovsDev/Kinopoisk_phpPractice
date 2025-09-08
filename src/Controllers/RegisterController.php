<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        $this->view('register');

    }
    public function register()
    {
        $validation = $this->request()->validate([
            'email' => ['required', 'email',],
            'password' => ['required', 'min:8', 'confirmed'],
            'name' => ['required', 'min:3', 'max:20'],
            'password_confirmation' => ['required'],


        ]);
        if (!$validation) {

            foreach ($this->request()->errors() as $field => $errors) {
                $this->session()->set($field, $errors);
            }
            $this->redirect('/register');

        } else {
            $UserID = $this->db()->insert(
                'users',
                [
                    'email' => $this->request()->input('email'),
                    'password' => password_hash($this->request()->input('password'), PASSWORD_DEFAULT),
                    'name' => $this->request()->input('name'),
                ]
            );

            $this->redirect('/');

        }
    }

}