<?php
require __DIR__ . "/../init.php";

$pathInfo = $_SERVER["PATH_INFO"];

$routes = [
    "/items" => [
        "controller" => "itemManager",
        "method" => "index"
    ],
    "/item" => [
        "controller" => "itemManager",
        "method" => "show"
    ]
];


if (isset($routes[$pathInfo])) {
    $route = $routes[$pathInfo];
    $controller = $container->make($route["controller"]);
    $method = $route["method"];
    $controller->$method();
}

/*
if ($pathInfo == "/item") {
    $itemManager = $container->make("itemManager");
    $itemManager->index();
}*/