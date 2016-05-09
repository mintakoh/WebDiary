<?php
namespace Controller;

class IndexController
{
    public static function index()
    {
        view()->render('index', ['content' => "Welcome To TravelDiary App22"]);
    }
}