<?php

/**
 * Define Routes
 */
Router::route('/', [\Controller\IndexController::class, 'index']);
Router::route('/user/create', [\Controller\UserController::class, 'create']);
Router::route('/user/update', [\Controller\UserController::class, 'update']);
Router::route('/user/(\w+)/articles', [\Controller\ArticleController::class, 'userArticles']);

Router::route('/article', [\Controller\ArticleController::class, 'index']);
Router::route('/articles/my', [\Controller\ArticleController::class, 'index']);
Router::route('/article/write', [\Controller\ArticleController::class, 'write']);
Router::route('/article/create', [\Controller\ArticleController::class, 'create']);
Router::route('/article/(\d+)', [\Controller\ArticleController::class, 'view']);
Router::route('/article/modify/(\d+)', [\Controller\ArticleController::class, 'modify']);
Router::route('/article/update/(\d+)', [\Controller\ArticleController::class, 'update']);
Router::route('/article/remove/(\d+)', [\Controller\ArticleController::class, 'remove']);


Router::route('/auth', [\Controller\AuthController::class, 'index']);
Router::route('/auth/login', [\Controller\AuthController::class, 'login']);
Router::route('/auth/logout', [\Controller\AuthController::class, 'logout']);
Router::route('/join', [\Controller\AuthController::class, 'join']);
Router::route('/join/request', [\Controller\AuthController::class, 'joinRequest']);