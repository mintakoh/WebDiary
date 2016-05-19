<?php

date_default_timezone_set("Asia/Seoul");

require_once __DIR__."/vendor/autoload.php";
require_once __DIR__."/src/routes.php";
require_once __DIR__."/src/helper.php";


IoC::register('template', function(){
    return new \View\SimpleTemplate(__DIR__."/view");
});

$userRepository = new \Repository\UserTextFileRepository(__DIR__."/storage/passwd.txt");
$diaryRepository = new \Repository\ArticleFileRepository(__DIR__."/diary/", __DIR__."/storage/diary_id.txt");

/**
 * Run Application
 */
Session::init();

$app = new App($userRepository, $diaryRepository);
$app->setAsGlobal();
$app->execute();


