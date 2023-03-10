<?php

namespace app\user\control;

use app\shared\control\AbstractController;

class LoginManager extends AbstractController
{
    private $loginManagement;
    public function __construct(ILoginManagement $loginManagement)
    {
        $this->loginManagement = $loginManagement;
    }

    public function login()
    {
        // of there was no POST-Request, just render the Login Page
        if (!empty($_POST)) {
            if (!empty($_POST['username'] && !empty($_POST['password']))) {
                $usernameFromInput = sanitize($_POST['username']);
                $passwordFromInput = sanitize($_POST['password']);

                if ($this->loginManagement->login($usernameFromInput, $passwordFromInput)) {
                    header("Location: home");
                    return;
                }
            }
        }
        $this->render("user", "LoginPage", []);
    }

    public function register()
    {
        if (!empty($_POST)) {
            if (!empty($_POST['username'] && !empty($_POST['password']))) {
                $usernameFromInput = sanitize($_POST['username']);
                $passwordFromInput = sanitize($_POST['password']);

                if ($this->loginManagement->register($usernameFromInput, $passwordFromInput)) {
                    setcookie("username", $usernameFromInput);
                    header("Location: login");
                }
            }
        }
        $this->render("user", "RegisterPage", []);
    }


    public function logout()
    {
        $this->loginManagement->logout();
        header("Location: login");
    }
}