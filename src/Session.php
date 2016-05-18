<?php

/**
 * Created by PhpStorm.
 * User: seonghyun
 * Date: 2016. 5. 19.
 * Time: 오전 6:09
 */
class Session
{

    private static $sessionStarted = false;


    public static function init()
    {
        if (self::$sessionStarted == false) {
            session_start();
            self::$sessionStarted = true;
        }
    }


    public static function exists($key)
    {
        return isset($_SESSION[$key]);
    }

    public static function set($key, $value = false)
    {
        if (is_array($key) && $value === false) {
            foreach ($key as $name => $value) {
                $_SESSION[$name] = $value;
            }
        } else {
            $_SESSION[$key] = $value;
        }
    }

    public static function pull($key)
    {
        if (isset($_SESSION[$key])) {
            $value = $_SESSION[$key];
            unset($_SESSION[$key]);
            return $value;
        }
        return null;
    }

    public static function push($key, $value)
    {
        if(!isset($_SESSION[$key]) || !is_array($_SESSION[$key])) {
            $_SESSION[$key] = [];
        }
        $_SESSION[$key][] = $value;
    }

    public static function get($key, $child = false)
    {
        if ($child == true) {
            if (isset($_SESSION[$key][$child])) {
                return $_SESSION[$key][$child];
            }
        } else {
            if (isset($_SESSION[$key])) {
                return $_SESSION[$key];
            }
        }
        return null;
    }

    public static function getAll()
    {
        return $_SESSION;
    }


    public static function destroy($key = '')
    {
        if (self::$sessionStarted == false) {
            return;
        }
        if ($key =='') {
            session_unset();
            session_destroy();
            return;
        }
        unset($_SESSION[$key]);
    }
}