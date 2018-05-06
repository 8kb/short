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
class SafeArray
{
    protected $array;
    
    public function __construct(array $array)
    {
        $this->array = $array;
    }

    public function exist($fieldName)
    {
        return isset($this->array[$fieldName]);
    }
    
    public function getString($fieldName)
    {
        if(empty($this->array[$fieldName])) {
            return null;
        } else {
            return filter_var($this->array[$fieldName], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
    }    
    
    public function getInt($fieldName)
    {
        if(empty($this->array[$fieldName])) {
            return null;
        } else {
            return filter_var($this->array[$fieldName], FILTER_VALIDATE_INT);
        }
    }    
    
    public function getFloat($fieldName)
    {
        if(empty($this->array[$fieldName])) {
            return null;
        } else {
            return filter_var($this->array[$fieldName], FILTER_VALIDATE_FLOAT);
        }
    }    
    
    public function getBool($fieldName)
    {
        if(empty($this->array[$fieldName])) {
            return null;
        } else {
            return filter_var($this->array[$fieldName], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
        }
    }    
    
    public function getArray($fieldName)
    {
        if(empty($this->array[$fieldName]) or !is_array($this->array[$fieldName])) {
            return null;
        } else {
            return $this->array[$fieldName];
        }
    }    
    
    public function getSafeArray($fieldName)
    {
        if(empty($this->array[$fieldName]) or !is_array($this->array[$fieldName])) {
            return null;
        } else {
            return new SafeArray($this->array[$fieldName]);
        }
    }    
}
