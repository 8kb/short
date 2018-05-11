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
class ConfigService
{
    protected $data;
    
    public function __construct(array $data)
    {
        $this->data = $data;
    }
    
    public function __get($name)
    {
        if(isset($this->data[$name])) {
            return $this->data[$name];
        } else {
            return null;
        }
    }
}
