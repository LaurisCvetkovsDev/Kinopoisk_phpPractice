<?php

namespace App\Kernel\Auth;

interface AuthInterface
{
    public function attempt($username, $password);
    public function logout();
    public function check();
    public function user();
    public function username();
    public function password();
    public function table();
    public function session_field();



}