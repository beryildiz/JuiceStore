<?php

namespace app\user\control;


use app\user\entity\User;
use app\user\gateway\UserRepository;


class LoginService implements ILoginManagement
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login($username, $password)
    {
        $user = $this->userRepository->getUserByName($username);

        if (empty($user)) {
            return false;
        }

        if ($username == $user->username && $password == $user->password) {
            $_SESSION["login"] = $user->username;
            session_regenerate_id(true);
            return true;
        }
        return false;
    }

    public function logout()
    {
        unset($_SESSION["login"]);
        session_regenerate_id(true);
    }

    public function register($username, $password)
    {
        $user = User::createFullUser($username, $password);
        // parse username and password to repository and persist it
        return $this->userRepository->persist($user);
    }
}