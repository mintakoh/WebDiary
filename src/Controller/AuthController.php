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

    public static function join()
    {
        view()->render('join');
    }

    public static function joinRequest()
    {
        /**
         * Validation
         */
        
        $id = $_POST['id'];
        $password = $_POST['password'];
        $name = $_POST['name'];

        $userRepository = \App::$app->getUserRepository();
        $user = $userRepository->getUserById($id);

        if($user !== null) {
            $newUser = new User($id, $name, $password);
            $userRepository->createUser($newUser);

            $_SESSION['user_id'] = $newUser->getId();
            header('Location: /');
        }

        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }

}