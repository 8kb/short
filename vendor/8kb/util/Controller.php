<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace util;

/**
 *
 *
 * @author Mendel <mendel@zzzlab.com>
 */
class Controller
{
    public static $globalVar = [];
    public $param = [];
    public $lang;
    
    public static function doAction(string $route, array $param)
    {
        if(haveStr($route, ':')) {
            list($controllerName, $action) = explode(':', $route, 2);
        } else {
            $controllerName = $route;
            $action = 'default';
        }
        $lang = new \lang\Lang('app/'.$controllerName.'/'.$action);
        $controllerParts = explode('/', $controllerName);
        $lastId = count($controllerParts) -1;
        $controllerParts[$lastId] = ucfirst($controllerParts[$lastId]);
        $className = '\\app\\'. implode('\\', $controllerParts) . 'Controller';
        $actionName = $action.'Action';
        $controller = new $className($lang, $param);
        $controller->$actionName();
    }

    protected function __construct(\lang\Lang $lang, array $param)
    {
        $this->param = $param;
        $this->lang = $lang;
    }
    
    public function __get($name)
    {
        if(isset($this->param[$name])) {
            return $this->param[$name];
        } elseif(isset(static::$globalVar[$name])) {
            return static::$globalVar[$name];
        } else {
            return null;
        }
    }
    
    public function __call($name, $arguments)
    {
        if(endsBy($name, 'Action')) {
            throw new \util\http\NotFoundException();
        } else {
            throw new \BadFunctionCallException();
        }
    }
}
