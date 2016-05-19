<?php

namespace Controller;

use Core\IoC;
use Model\User;

class AuthController
{
    public function index()
    {
        $error = isset($_GET['error']);
        view()->render('auth', ['error' => $error]);
    }

    public function login()
    {
        /** @var \Repository\UserRepositoryInterface $userRepository */
        $userRepository = IoC::resolve('userStore');

        /** @var User $user */
        $user = $userRepository->getUserById($_POST['id']);

        if($user !== null && $user->getPassword() == $_POST['password']) {
            $_SESSION['user_id'] = $user->getId();
            header('Location: /');
        } else {
            $_SESSION['user_id'] = null;
            header('Location: /?r=/auth&error=NOT_VALID_USER');
        }
    }

    public function logout()
    {
        $_SESSION['user_id'] = null;
        redirect('/');
    }

    public function join()
    {
        view()->render('join');
    }

    public function joinRequest()
    {
        $id = $_POST['id'];
        $password = $_POST['password'];
        $name = $_POST['name'];

        /** @var \Repository\UserRepositoryInterface $userRepository */
        $userRepository = IoC::resolve('userStore');
        $user = $userRepository->getUserById($id);

        if($user !== null) {
            redirectBack();
        }

        $newUser = new User($id, $password, $name);
        $userRepository->createUser($newUser);

        $_SESSION['user_id'] = $newUser->getId();
        header('Location: /');
    }

}