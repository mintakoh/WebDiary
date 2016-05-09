<?php

/**
 * Define Routes
 */
Router::route('/', [\Controller\IndexController::class, 'index']);
Router::route('/create/user', [\Controller\UserController::class, 'create']);
Router::route('/update/user', [\Controller\UserController::class, 'update']);
Router::route('/article/write', [\Controller\ArticleController::class, 'index']);
Router::route('/article/create', [\Controller\ArticleController::class, 'create']);
