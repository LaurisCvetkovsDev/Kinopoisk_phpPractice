<?php

namespace App\Kernel\View;

interface ViewInterface
{
    public function page($name);

    public function component($name);


}