<?php

namespace app\shared\control;

class AbstractController
{
    protected function render($module, $view, $params)
    {
        extract($params);
        include __DIR__ . "/../../{$module}/boundary/{$view}.php";
    }
}