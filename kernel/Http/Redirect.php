<?php

namespace App\Kernel\Http;

class Redirect implements RedirectInterface
{
    public function to($url): never
    {
        header("Location: $url");
        exit;
    }
}