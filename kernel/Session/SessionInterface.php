<?php
namespace App\Kernel\Session;
interface SessionInterface
{
    public function set($key, $value);
    public function get($key, $deafault = null);
    public function getFlash($key, $default = null);
    public function has($key);
    public function remove($key);
    public function destroy();
}