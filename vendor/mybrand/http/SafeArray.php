<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace mybrand\http;

/**
 * Safe filtering for data in array
 *
 * @author Mendel <mendel@zzzlab.com>
 */
class SafeArray
{
    /**
     * @var array storage
     */
    protected $array;
    
    /**
     * Constructor
     * @param array $array
     */
    public function __construct(array $array)
    {
        $this->array = $array;
    }

    /**
     * Check if field exist
     * @param string $fieldName field name
     * @return bool
     */
    public function exist(string $fieldName) : bool
    {
        return isset($this->array[$fieldName]);
    }
    
    /**
     * Filter string
     * @param string $fieldName field name
     * @return string
     */
    public function getString(string $fieldName) : string
    {
        if (!$this->exist($fieldName)) {
            throw new \Exception('Field '. $fieldName . ' not exist!');
        }
        $result = filter_var($this->array[$fieldName], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (!is_string($result)) {
            throw new \Exception('Field '. $fieldName . ' not is string!');
        }
        return $result;
    }
    
    /**
     * Filter int
     * @param string $fieldName field name
     * @return int
     */
    public function getInt(string $fieldName) : int
    {
        if (!$this->exist($fieldName)) {
            throw new \Exception('Field '. $fieldName . ' not exist!');
        }
        $result = filter_var($this->array[$fieldName], FILTER_VALIDATE_INT);
        if (!is_int($result)) {
            throw new \Exception('Field '. $fieldName . ' not is int!');
        }
        return $result;
    }
    
    /**
     * Filter float
     * @param string $fieldName field name
     * @return float
     */
    public function getFloat(string $fieldName) : float
    {
        if (!$this->exist($fieldName)) {
            throw new \Exception('Field '. $fieldName . ' not exist!');
        }
        $result = filter_var($this->array[$fieldName], FILTER_VALIDATE_FLOAT);
        if (!is_float($result)) {
            throw new \Exception('Field '. $fieldName . ' not is float!');
        }
        return $result;
    }
    
    /**
     * Filter bool
     * @param string $fieldName field name
     * @return bool
     */
    public function getBool(string $fieldName) : bool
    {
        if (!$this->exist($fieldName)) {
            throw new \Exception('Field '. $fieldName . ' not exist!');
        }
        $result = filter_var($this->array[$fieldName], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
        if (!is_bool($result)) {
            throw new \Exception('Field '. $fieldName . ' not is bool!');
        }
        return $result;
    }
    
    /**
     * Filter array (not safe)
     * @param string $fieldName field name
     * @return array
     */
    public function getArray(string $fieldName) : array
    {
        if (!$this->exist($fieldName)) {
            throw new \Exception('Field '. $fieldName . ' not exist!');
        }
        if (!is_array($this->array[$fieldName])) {
            throw new \Exception('Field '. $fieldName . ' not array!');
        }
        return $this->array[$fieldName];
    }
    
    /**
     * Filter array (safe) and return it as SafeArray
     * @param string $fieldName field name
     * @return \mybrand\http\SafeArray
     */
    public function getSafeArray(string $fieldName)
    {
        if (!$this->exist($fieldName)) {
            throw new \Exception('Field '. $fieldName . ' not exist!');
        }
        if (!is_array($this->array[$fieldName])) {
            throw new \Exception('Field '. $fieldName . ' not array!');
        }
        return new SafeArray($this->array[$fieldName]);
    }
}
