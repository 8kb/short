<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace mybrand\dao\pdo;

/**
 *
 *
 * @author Mendel <mendel@zzzlab.com>
 */
class DummyDao implements \mybrand\dao\DaoInterface
{
    protected $tableClass;
    public $sql = '';
    public $parameters = [];
    public $lastId;
    public $result = [[]];
    
    public function __construct(string $tableClass)
    {
        $this->tableClass = $tableClass;
    }

    public function table(string $tableName): \mybrand\dao\TableInterface
    {
        $class = $this->tableClass;
        return new $class($this, $tableName);
    }

    /**
     * Execute request
     * @param string $sql
     * @param array $parameters
     */
    public function executeRead(string $sql, array $parameters) : \Traversable
    {
        $this->sql = $sql;
        $this->parameters = $parameters;
        return new \ArrayIterator($this->result);
    }

    /**
     * Execute request
     * @param string $sql
     * @param array $parameters
     */
    public function executeWrite(string $sql, array $parameters) : \Traversable
    {
        $this->sql = $sql;
        $this->parameters = $parameters;
    }
    
    /**
     * Get last insert ID (for autoincrement etc)
     * @return mixed
     */
    public function lastInsertId()
    {
        return $this->lastId;
    }
}
