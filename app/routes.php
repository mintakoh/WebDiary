<?php

/**
 * Define Routes
 */
Router::route('/', [\Controller\IndexController::class, 'index']);
Router::route('/create/user', [\Controller\UserController::class, 'create']);

