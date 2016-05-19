<?php

class App
{
    /**
     * @var App
     */
    public static $app;

    /**
     * App constructor.
     */
    public function __construct()
    {
        $this->userRepository = IoC::resolve('userStore');
        $this->diaryRepository = IoC::resolve('diaryStore');
    }

    /**
     * @return App
     */
    public function setAsGlobal()
    {
        return static::$app = $this;
    }

    public function execute()
    {
        $r = isset($_GET['r']) ? $_GET['r'] : '/';
        Router::execute($r);
    }
}