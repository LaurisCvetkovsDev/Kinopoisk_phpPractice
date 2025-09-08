<?php

namespace App\Kernel\View;

interface ViewInterface
{
    public function page($name, $data = []);

    public function component($name);

    public function title();
}