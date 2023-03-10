<?php
session_start();

use app\shared\router\Router;

require __DIR__ . "/../init.php";
$pathInfo = $_SERVER["PATH_INFO"];

$router = new Router($container);

// add routes
$router->addRoute("/items", "itemManager", "index");
$router->addRoute("/item", "itemManager", "show");
$router->addRoute("/home", "homeManager", "index");
$router->addRoute("/login", "loginManager", "login");
$router->addRoute("/logout", "loginManager", "logout");
$router->addRoute("/register", "loginManager", "register");


// dispatch request
$router->dispatch($pathInfo);
