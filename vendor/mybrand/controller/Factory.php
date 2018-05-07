<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace mybrand\controller;

/**
 * Controller factory
 *
 * @author Mendel <mendel@zzzlab.com>
 */
class Factory
{
    /**
     * @var array global data storage (for all controllers)
     */
    public static $globalVar = [];
    
    /**
     * Get prepared controller
     * @param string $controllerName controllers name
     * @param array $parameters controller parameters
     * @return \mybrand\controller\AbstractController
     * @throws \mybrand\core\NotFoundException
     */
    public static function get(string $controllerName, array $parameters) : AbstractController
    {
        $className = static::getClassName($controllerName);
        if (!class_exists($className)) {
            throw new \mybrand\core\NotFoundException();
        }
        return new $className($controllerName, $parameters);
    }
    
    /**
     * Get class name
     * @param string $controllerName controller name
     * @return string
     */
    protected static function getClassName(string $controllerName) : string
    {
        $controllerParts = explode('/', $controllerName);
        $lastId = count($controllerParts) -1;
        $controllerParts[$lastId] = ucfirst($controllerParts[$lastId]);
        return '\\app\\'. implode('\\', $controllerParts) . 'Controller';
    }
}
