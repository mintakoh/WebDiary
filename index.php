<?php
require_once __DIR__."/vendor/autoload.php";


$userRepository = new \Repository\UserTextFileRepository(__DIR__."/storage/passwd.txt");
$travelDiary = new TravelDiaryApp($userRepository);
