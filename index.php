<?php

session_start();
require_once __DIR__."/vendor/autoload.php";

$userRepository = new \Repository\UserTextFileRepository(__DIR__."/storage/passwd.txt");

/**
 * Run Application
 */
$travelDiary = new TravelDiaryApp($userRepository);
$travelDiary->setAsGlobal();
$travelDiary->execute();
