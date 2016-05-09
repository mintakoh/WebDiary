<?php

/**
 * Define Routes
 */
Router::route('/', [\Controller\IndexController::class, 'index']);
Router::route('/user/create', [\Controller\UserController::class, 'create']);
Router::route('/user/update', [\Controller\UserController::class, 'update']);

Router::route('/article', [\Controller\ArticleController::class, 'index']);
Router::route('/article/write', [\Controller\ArticleController::class, 'write']);
Router::route('/article/create', [\Controller\ArticleController::class, 'create']);

Router::route('/auth', [\Controller\AuthController::class, 'index']);
Router::route('/auth/login', [\Controller\AuthController::class, 'login']);
Router::route('/auth/logout', [\Controller\AuthController::class, 'logout']);