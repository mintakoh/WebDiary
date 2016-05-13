<?php

namespace Controller;


use Model\User;

class AuthController
{
    public static function index()
    {
        $error = isset($_GET['error']);
        view()->render('auth', ['error' => $error]);
    }

    public static function login()
    {
        /** @var User $user */
        $user = \App::$app->getUserRepository()->getUserById($_POST['id']);

        if($user !== null && $user->getPassword() == $_POST['password']) {
            $_SESSION['user_id'] = $user->getId();
            header('Location: /');
        } else {
            $_SESSION['user_id'] = null;
            header('Location: /?r=/auth&error=NOT_VALID_USER');
        }
    }

    public static function logout()
    {
        $_SESSION['user_id'] = null;
        header('Location: /');
    }
}