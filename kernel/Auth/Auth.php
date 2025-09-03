<?php
namespace App\Kernel\Auth;

use App\Kernel\Config\ConfigInterface;
use App\Kernel\Database\DatabaseInterface;
use App\Kernel\Session\SessionInterface;

class Auth implements AuthInterface
{


    public function __construct(
        private DatabaseInterface $database,
        private SessionInterface $session,
        private ConfigInterface $config,
    ) {

    }
    public function username()
    {
        return $this->config->get('auth.username', 'email');
    }
    public function password()
    {
        return $this->config->get('auth.password', 'password');
    }
    public function table()
    {
        return $this->config->get('auth.table', 'users');
    }

    public function logout()
    {

    }
    public function attempt($username, $password)
    {
        $user = $this->database->first($this->table(), [
            $this->username() => $username
        ]);



        if (!$user) {
            return false;
        }

        if (!password_verify($password, $user[$this->password()])) {
            return false;
        }

        $this->session->set($this->session_field(), $user);
        return true;
    }

    public function check()
    {

    }
    public function user()
    {

    }

    public function session_field()
    {
        return $this->config->get('auth.session_field', 'user_id');

    }

}