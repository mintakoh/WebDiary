<?php

use Core\IoC;

/**
 * @return \Core\View\SimpleTemplate
 */
function view() {
    return IoC::resolve('template');
}

function redirect($url) {
    header('Location: ' . $url);
}

function redirectBack() {
    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
    else {
        header('Location: /');
    }
}

/**
 * @return App
 */
function app() {
    return \App::$app;
}

/**
 * @return \Model\User|null
 */
function getCurrentUser() {
    if(!isset($_SESSION['user_id'])) {
        return null;
    }

    /** @var \Repository\UserRepositoryInterface $userStore */
    $userStore = IoC::resolve('userStore');
    return $userStore->getUserById($_SESSION['user_id']);
}

/**
 * @return bool
 */
function isLogged() {
    return isset($_SESSION['user_id']);
}