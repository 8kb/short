<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace mybrand\dao\pdo\table;

/**
 * Bootstrap class for Table (PDO version)
 * @author Mendel <mendel@zzzlab.com>
 */
abstract class AbstractTable implements \mybrand\dao\TableInterface
{
    use WhereTrait, ModifierTrait;
    
    /**
     * @var \dao\pdo\Dao
     */
    protected $dao;
    
    /**
     * @var string table name
     */
    protected $tableName;
    
    /**
     * @var array Parameters array
     */
    protected $parameters = [];
    
    /**
     * @var string Query string
     */
    protected $sql = '';
    
    /**
     * Constructor
     * @param \mybrand\dao\DaoInterface $dao DAO for execute query
     * @param string $tableName table name
     */
    public function __construct(\mybrand\dao\DaoInterface $dao, string $tableName)
    {
        $this->dao = $dao;
        $this->tableName = $tableName;
        $this->fixState();
    }

    /**
     * Execute query
     * @return \Traversable
     */
    protected function executeRead() : \Traversable
    {
        $sql = $this->sql;
        $parameters = $this->parameters;
        $this->resetState();
        $result = $this->dao->executeRead(
            $sql,
            $parameters
        );
        return $result;
    }
    
    /**
     * Execute query
     */
    protected function executeWrite()
    {
        $sql = $this->sql;
        $parameters = $this->parameters;
        $this->resetState();
        $this->dao->executeWrite(
            $sql,
            $parameters
        );
    }
    
    public function fixState()
    {
        foreach(['where', 'fields', 'limit', 'offset', 'order', 'distinct'] as $key) {
            $this->savedState[$key] = $this->$key;
        }
    }
    
    protected function resetState()
    {
        $this->sql = '';
        $this->parameters = [];
        //
        foreach(['where', 'fields', 'limit', 'offset', 'order', 'distinct'] as $key) {
            $this->$key = $this->savedState[$key];
        }
    }
}
