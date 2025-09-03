<?php

namespace App\Kernel\Router;

class Route
{
    public function __construct(
        private string $uri,
        private string $method,
        private $action,
        private array $middlewares = [],
    ) {
    }

    public static function get($uri, $action, array $middlewares = [])
    {
        return new static($uri, 'GET', $action, $middlewares);
    }

    public static function post($uri, $action, array $middlewares = [])
    {
        return new static($uri, 'POST', $action, $middlewares);

    }
    public function getMidllewares()
    {
        return $this->middlewares;
    }
    public function hasMiddlewares()
    {
        return !empty($this->middlewares);
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
