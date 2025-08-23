<?php

namespace App\Kernel\Session;

class Session implements SessionInterface
{

    public function __construct()
    {
        session_start();
    }
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    public function get($key, $deafault = null)
    {
        return $_SESSION[$key] ?? $deafault;
    }
    public function getFlash($key, $default = null)
    {
        $value = $this->get($key, $default);
        $this->remove($key);
        return $value;
    }

    public function has($key)
    {
        return isset($_SESSION[$key]);
    }

    public function remove($key)
    {
        unset($_SESSION[$key]);
    }
    public function destroy()
    {
        session_destroy();
    }
}