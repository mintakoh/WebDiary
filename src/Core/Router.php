<?php

namespace Core;

class Router
{
    private static $routes = [];

    public static function route($pattern, $callback) {
        $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
        self::$routes[$pattern] = $callback;
    }

    public static function execute($url) {
        foreach (self::$routes as $pattern => $callback) {
            if (preg_match($pattern, $url, $params)) {
                array_shift($params);

                $controller = new $callback[0]();
                $callback[0] = $controller;
                return call_user_func_array($callback, array_values($params));
            }
        }
    }

}