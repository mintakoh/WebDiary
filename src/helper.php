<?php

/**
 * @return \View\SimpleTemplate
 */
function view() {
    return \App::$app->getView();
}

/**
 * @return \Model\User|null
 */
function getCurrentUser() {
    if(!isset($_SESSION['user_id'])) {
        return null;
    }
    return App::$app->getUserRepository()->getUserById($_SESSION['user_id']);
}

/**
 * @return bool
 */
function isLogged() {
    return isset($_SESSION['user_id']);
}