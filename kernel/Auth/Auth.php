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
    public function session_field()
    {
        return $this->config->get('auth.session_field', 'user_id');

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

        $this->session->set($this->session_field(), $user['ID']);
        return true;
    }

    public function check()
    {
        return $this->session->has($this->session_field());
    }
    public function logout()
    {
        $this->session->remove($this->session_field());
    }
    public function user()
    {
        if (!$this->check()) {
            return null;
        }
        $user = $this->database->first(
            $this->table(),
            [
                'id' => $this->session->get(
                    $this->session_field()
                ),
            ]
        );
        if ($user) {
            return new User(
                $user['ID'],
                $user['email'],
                $user['password'],
                $user['name'],

            );
        }
        return null;
    }




}