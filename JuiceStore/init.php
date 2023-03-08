<?php

use app\shared\container\Container;

require __DIR__ . "/autoload.php";

function sanitize($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$container = new Container();


