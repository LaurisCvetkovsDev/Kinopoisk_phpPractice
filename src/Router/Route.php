<?php

namespace App\Router;

class Route
{
    public function __construct(
        private string $uri,
        private string $method,
        private $action
    ) {
    }

    public static function get($uri, $action)
    {
        return new static($uri, 'GET', $action);
    }

    public static function post($uri, $action)
    {
        return new static($uri, 'POST', $action);

    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getMethod(): string
    {
        return $this->method;
    }
}
