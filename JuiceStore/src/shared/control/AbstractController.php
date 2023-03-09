<?php

namespace app\shared\control;

class AbstractController
{
    /**
     * @param $module - name of the root namespace eg. item
     * @param $view - classname of the view eg. ItemPage
     * @param $params - parameters eg. ["items" => $item], [""] for no parameters
     *
     * example usage:
     * $this->render("item", "ItemPage", [
     * "items" => $items
     * ]);
     */
    protected function render($module, $view, $params)
    {
        extract($params);
        include __DIR__ . "/../../{$module}/boundary/{$view}.php";
    }
}