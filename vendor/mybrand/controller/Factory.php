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
     * @var array default configs value for each controller
     */
    protected $defaultParameters = [];
    
    /**
     * Constructor
     * @param array $defaultParameters default parameters array
     */
    public function __construct(array $defaultParameters)
    {
        $this->defaultParameters = $defaultParameters;
    }

    /**
     * Get prepared controller
     * @param string $controllerName controllers name
     * @param array $parameters controller parameters
     * @return \mybrand\controller\AbstractController
     * @throws \mybrand\core\NotFoundException
     */
    public function get(string $controllerName, array $parameters) : AbstractController
    {
        $className = $this->getClassName($controllerName);
        if (!class_exists($className)) {
            throw new \mybrand\core\NotFoundException();
        }
        if (isset($this->defaultParameters[$controllerName])) {
            $parameters = array_merge($this->defaultParameters[$controllerName], $parameters);
        }
        return new $className($controllerName, $parameters);
    }
    
    /**
     * Get class name
     * @param string $controllerName controller name
     * @return string
     */
    protected function getClassName(string $controllerName) : string
    {
        $controllerParts = explode('/', $controllerName);
        $lastId = count($controllerParts) -1;
        $controllerParts[$lastId] = ucfirst($controllerParts[$lastId]);
        return '\\controller\\'. implode('\\', $controllerParts) . 'Controller';
    }
}
