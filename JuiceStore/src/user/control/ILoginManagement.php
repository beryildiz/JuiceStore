<?php

namespace app\user\control;

interface ILoginManagement
{
    public function login($username, $password);

    public function logout();

    public function register($username, $password);
}