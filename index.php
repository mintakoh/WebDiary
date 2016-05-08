<?php
require_once __DIR__."/vendor/autoload.php";


$userRepository = new \Repository\UserTextFileRepository();

$travelDiary = new TravelDiary($userRepository);


