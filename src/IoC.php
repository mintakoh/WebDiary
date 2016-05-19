<?php

class IoC
{
    protected static $registry = [];

    public static function register($name, Closure $resolve)
    {
        static::$registry[$name] = $resolve;
    }

    public static function resolve($name)
    {
        if ( static::registered($name) )
        {
            $name = static::$registry[$name];
            return $name();
        }
        throw new Exception('Nothing registered with that name, fool.');
    }

    public static function registered($name)
    {
        return array_key_exists($name, static::$registry);
    }
}