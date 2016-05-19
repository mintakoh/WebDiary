<?php
namespace Core;

class IoC
{
    protected static $registry = [];

    protected static $singleton = [];


    public static function register($name, \Closure $resolve)
    {
        static::$registry[$name] = $resolve;
    }

    public static function singleton($name, \Closure $resolve)
    {
        static::$singleton[$name] = $resolve();
    }

    public static function resolve($name)
    {
        if ( static::singletoned($name))
        {
            $instance = static::$singleton[$name];
            return $instance;
        }

        if ( static::registered($name) )
        {
            $name = static::$registry[$name];
            return $name();
        }
        throw new \Exception('Nothing registered with that name, fool.');
    }

    public static function registered($name)
    {
        return array_key_exists($name, static::$registry);
    }

    public static function singletoned($name)
    {
        return array_key_exists($name, static::$singleton);
    }
}