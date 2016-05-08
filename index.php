<?php

session_start();
require_once __DIR__."/vendor/autoload.php";
require_once __DIR__."/app/routes.php";
require_once __DIR__."/app/helper.php";

$simpleTemplate = new \View\SimpleTemplate(__DIR__."/view");
$userRepository = new \Repository\UserTextFileRepository(__DIR__."/storage/passwd.txt", $simpleTemplate);

/**
 * Run Application
 */
$app = new App($userRepository, $simpleTemplate);
$app->setAsGlobal();
$app->execute();
