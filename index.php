<?php

date_default_timezone_set("Asia/Seoul");

session_start();
require_once __DIR__."/vendor/autoload.php";
require_once __DIR__."/src/routes.php";
require_once __DIR__."/src/helper.php";

$simpleTemplate = new \View\SimpleTemplate(__DIR__."/view");
$userRepository = new \Repository\UserTextFileRepository(__DIR__."/storage/passwd.txt", $simpleTemplate);
$diaryRepository = new \Repository\ArticleFileRepository(__DIR__."/diary/", __DIR__."/storage/diary_id.txt");

/**
 * Run Application
 */
$app = new App($userRepository, $diaryRepository, $simpleTemplate);
$app->setAsGlobal();
$app->execute();


