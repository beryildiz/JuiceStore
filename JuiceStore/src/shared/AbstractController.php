<?php

namespace app\shared;

class AbstractController
{
    protected function render($view, $params)
    {
        extract($params);
        include __DIR__ . "/../../item/boundary/{$view}.php";
    }
}