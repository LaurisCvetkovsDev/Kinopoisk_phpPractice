<?php
namespace App\Kernel\Auth;

use App\Kernel\Database\DatabaseInterface;
use App\Kernel\Session\SessionInterface;

class Auth implements AuthInterface
{

    public function __construct(private DatabaseInterface $database, private SessionInterface $session)
    {

    }

    public function logout()
    {

    }
    public function attempt($username, $password)
    {

    }
    public function check()
    {

    }
    public function user()
    {

    }

}