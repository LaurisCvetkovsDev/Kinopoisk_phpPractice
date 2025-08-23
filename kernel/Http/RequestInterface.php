<?php
namespace App\Kernel\Http;

interface RequestInterface
{
    public static function createFromGlobals();
    public function uri();
    public function method();
    public function input($name, $deafault = null);
    public function setValidator($validator);
    public function validate($rules);
    public function errors();

}