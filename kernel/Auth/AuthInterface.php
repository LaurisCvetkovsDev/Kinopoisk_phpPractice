<?php

namespace App\Kernel\Auth;

interface AuthInterface
{
    public function attempt($username, $password);
    public function logout();
    public function check();
    public function user();



}