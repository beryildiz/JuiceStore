<?php
require __DIR__ . "/../init.php";
$pathInfo = $_SERVER["PATH_INFO"];


/**
 * Routes Array for using new routes
 * With given key return a value that hold value:
 * "controller" : which controller should be created
 * "method": which method should be invoked
 */
$routes = [
    "/items" => [
        "controller" => "itemManager",
        "method" => "index"
    ],
    "/item" => [
        "controller" => "itemManager",
        "method" => "show"
    ],
    "/home" => [
        "controller" => "homeManager",
        "method" => "index"
    ]
];

/**
 * Extract Key value pairs and build a valid URI
 */
if (isset($routes[$pathInfo])) {
    $route = $routes[$pathInfo];
    $controller = $container->make($route["controller"]);
    $method = $route["method"];
    $controller->$method();
}

