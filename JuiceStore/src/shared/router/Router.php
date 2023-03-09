<?php

namespace app\shared\router;

use app\shared\container\Container;

class Router
{
    private $routes = [];
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function addRoute($url, $controller, $method)
    {
        $this->routes[$url] = [
            "controller" => $controller,
            "method" => $method
        ];
    }

    public function dispatch($url)
    {
        if (isset($this->routes[$url])) {
            $route = $this->routes[$url];
            $controller = $this->container->make($route["controller"]);
            $method = $route["method"];
            $controller->$method();
        } else {
            // handle 404 error
        }
    }
}
