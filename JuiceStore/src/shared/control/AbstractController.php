<?php

namespace app\shared\control;

class AbstractController
{
    protected function render($view, $params)
    {
        extract($params);
        include __DIR__ . "/../../item/boundary/{$view}.php";
    }
}