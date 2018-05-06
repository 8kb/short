<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace mybrand\controller;

/**
 *
 *
 * @author Mendel <mendel@zzzlab.com>
 */
class Factory
{
    public static $globalVar = [];
    
    public static function doAction(string $route, array $param)
    {
        if(haveStr($route, ':')) {
            list($controllerName, $action) = explode(':', $route, 2);
        } else {
            $controllerName = $route;
            $action = 'default';
        }
        $lang = new \mybrand\util\Lang('app/'.$controllerName.'/'.$action);
        $controllerParts = explode('/', $controllerName);
        $lastId = count($controllerParts) -1;
        $controllerParts[$lastId] = ucfirst($controllerParts[$lastId]);
        $className = '\\app\\'. implode('\\', $controllerParts) . 'Controller';
        $actionName = $action.'Action';
        if(!class_exists($className)) {
            throw new \mybrand\http\NotFoundException();
        }
        $controller = new $className($lang, $param);
        $controller->$actionName();
    }
}
