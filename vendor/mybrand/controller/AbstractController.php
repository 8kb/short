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
abstract class AbstractController
{
    private $param = [];
    protected $lang;

    public function __construct(\mybrand\util\Lang $lang, array $param)
    {
        $this->param = $param;
        $this->lang = $lang;
    }
    
    public function __get($name)
    {
        if(isset($this->param[$name])) {
            return $this->param[$name];
        } elseif(isset(Factory::$globalVar[$name])) {
            return Factory::$globalVar[$name];
        } else {
            return null;
        }
    }
    
    public function __call($name, $arguments)
    {
        if(endsBy($name, 'Action')) {
            throw new \mybrand\http\NotFoundException();
        } else {
            throw new \BadFunctionCallException();
        }
    }
}
