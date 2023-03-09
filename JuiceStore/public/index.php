<?php

use app\shared\router\Router;

require __DIR__ . "/../init.php";
$pathInfo = $_SERVER["PATH_INFO"];

$router = new Router($container);

// add routes
$router->addRoute("/items", "itemManager", "index");
$router->addRoute("/item", "itemManager", "show");
$router->addRoute("/home", "homeManager", "index");

// dispatch request
$router->dispatch($pathInfo);
