<?php

session_start();
require_once __DIR__."/vendor/autoload.php";
require_once __DIR__."/app/routes.php";

$userRepository = new \Repository\UserTextFileRepository(__DIR__."/storage/passwd.txt");

/**
 * Run Application
 */
$app = new TravelDiaryApp($userRepository);
$app->setAsGlobal();
$app->execute();
