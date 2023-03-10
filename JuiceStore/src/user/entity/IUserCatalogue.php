<?php

namespace app\user\entity;

interface IUserCatalogue
{
    public function getUserByName($username);

    public function getUserByRole($role);
}