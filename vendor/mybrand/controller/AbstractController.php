<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace mybrand\controller;

/**
 * Abstract parent for all controllers
 *
 * @author Mendel <mendel@zzzlab.com>
 */
abstract class AbstractController
{
    /**
     * @var array controller parameters
     */
    private $parameters = [];
    
    /**
     * @var string controller name (for lang componentId)
     */
    private $selfName;
    
    /**
     * @var \mybrand\core\Lang lang helper for current controller
     */
    protected $lang;

    /**
     * Constructor
     * @param string $controllerName self name (id)
     * @param array $parameters parameters
     */
    public function __construct(string $controllerName, array $parameters)
    {
        $this->selfName = $controllerName;
        $this->parameters = $parameters;
    }
    
    /**
     * Execute action
     * @param string $action action name
     */
    public function action(string $action)
    {
        $this->lang = new \mybrand\core\Lang('app/'.$this->selfName.'/'.$action);
        $actionName = $action.'Action';
        $this->$actionName();
    }

    /**
     * Get parameter or global parameter (magic)
     * @param string $name field name
     * @return mixed
     */
    public function __get(string $name)
    {
        if (isset($this->parameters[$name])) {
            return $this->parameters[$name];
        } elseif (isset(Factory::$globalVar[$name])) {
            return Factory::$globalVar[$name];
        } else {
            return null;
        }
    }
    
    /**
     * Dummy method for throw 404 if action not exist
     * @param string $name methods name
     * @param array $arguments
     * @throws \mybrand\core\NotFoundException
     * @throws \BadFunctionCallException
     */
    public function __call($name, $arguments)
    {
        if (endsBy($name, 'Action')) {
            throw new \mybrand\core\NotFoundException();
        } else {
            throw new \BadFunctionCallException();
        }
    }
}
