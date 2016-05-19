<?php
namespace Controller;

class IndexController
{
    public function index()
    {
        view()->render('index', ['content' => "Welcome To TravelDiary App22"]);
    }
}