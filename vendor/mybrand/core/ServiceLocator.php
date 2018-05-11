<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace mybrand\core;

/**
 *
 *
 * @author Mendel <mendel@zzzlab.com>
 */
class ServiceLocator
{
    protected static $storage = [];
    
    public static $factory = [];
    
    public static function get($name)
    {
        if (!isset(static::$storage[$name]) and isset(static::$factory[$name])) {
            static::createFromFactory($name);
        } elseif (!isset(static::$storage[$name])) {
            $class = static::getDefaultClassName($name);
            static::$storage[$name] = new $class();
        }
        return static::$storage[$name];
    }
    
    protected static function createFromFactory(string $name)
    {
        $factory = static::$factory[$name];
        if (is_string($factory)) {
            static::$storage[$name] = new $factory();
        } else {
            static::$storage[$name] = $factory();
        }
    }

    /**
     * Get default class name
     * @param string $serviceName service name
     * @return string
     */
    protected static function getDefaultClassName(string $serviceName) : string
    {
        $serviceParts = explode('/', $serviceName);
        $lastId = count($serviceParts) - 1;
        $serviceParts[$lastId] = ucfirst($serviceParts[$lastId]);
        return '\\service\\'. implode('\\', $serviceParts) . 'Service';
    }
}
