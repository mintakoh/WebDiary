<?php
date_default_timezone_set("Asia/Seoul");
require_once __DIR__."/vendor/autoload.php";
require_once __DIR__."/src/routes.php";
require_once __DIR__."/src/helper.php";

use Core\Session;
use Core\IoC;

IoC::register('template', function(){
    return new \Core\View\SimpleTemplate(__DIR__."/view");
});

IoC::register('userStore', function(){
    return new \Repository\UserTextFileRepository(__DIR__."/storage/passwd.txt");
});

IoC::register('diaryStore', function(){
    return new \Repository\ArticleFileRepository(__DIR__."/diary/", __DIR__."/storage/diary_id.txt");
});

/**
 * Run Application
 */
Session::init();

$app = new App();
$app->setAsGlobal();
$app->execute();


