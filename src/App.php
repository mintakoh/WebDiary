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
    public function __construct() {}

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