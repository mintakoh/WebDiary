<?php

namespace Controller;


use Model\User;

class AuthController
{
    public static function index()
    {
        view()->render('auth');
    }

    public static function login()
    {
        /** @var User $user */
        $user = \App::$app->getUserRepository()->getUserById($_POST['id']);

        if($user !== null && $user->getPassword() == $_POST['password']) {
            $_SESSION['user'] = $user;
        } else {
            $_SESSION['user'] = null;
        }

        var_dump($_SESSION);
    }
}