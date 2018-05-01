<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace dao\pdo\table;

/**
 * Core functionality for where statement
 * @author Mendel <mendel@zzzlab.com>
 */
trait WhereTrait
{
    /**
     * @var array Where storage
     */
    protected $where = [];

    /**
     * Add where statement to storage, prefix for unique
     *
     * @param string $statement where data
     * @return \dao\TableInterface
     */
    public function where(array $statement) : \dao\TableInterface
    {
        $data = $this->prepareWhere($statement);
        $prefix = 'c'.count($this->where).'_'; // Prefix statement by nubmer
        $where = $data[0];
        unset($data[0]);
        foreach ($data as $key => $value) {
            $this->parameters[$prefix.$key] = $value;
            $where = str_replace(':'.$key, ':'.$prefix.$key, $where);
        }
        $this->where[] = $where;
        //
        return $this;
    }
    
    /**
     * Prepare where format, to internal format
     * @param mixed $data
     * @return array
     * @throws \Exception
     */
    protected function prepareWhere($data) : array
    {
        if (true === $data) { // If True - return true statement
            $data = $this->trueStatement();
        } elseif (false === $data) { // If False - return false statement
            $data = $this->falseStatement();
        } elseif (is_array($data)) {
            $data = $this->array2where($data);
        } else {
            throw new \Exception('Unknown where format');
        }
        return $data;
    }
    
    /**
     * Return statemetn always true
     */
    abstract protected function trueStatement() : array;
    
    /**
     * Return statement always false
     */
    abstract protected function falseStatement() : array;
    
    /**
     * Format array of data to where statement
     */
    abstract protected function array2where($data) : array;
}
