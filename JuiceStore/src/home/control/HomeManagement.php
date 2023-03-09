<?php

namespace app\home\control;

use app\shared\control\AbstractController;


class HomeManagement extends AbstractController implements IHomeManagement
{

    public function index()
    {
        $this->render("home", "HomePage", [""]);
    }
}