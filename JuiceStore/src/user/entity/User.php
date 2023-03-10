<?php

namespace app\user\entity;

class User
{
    public $id;
    public $username;
    public $password;
    public $role;


    // php does not have parameter overloading
    public static function createFullUser($username, $password)
    {
        $instance = new self();

        $instance->username = $username;
        $instance->password = $password;
        $instance->role = "user";

        return $instance;
    }


}