<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace mybrand\dao;

/**
 * Table interface
 * @author Mendel <mendel@zzzlab.com>
 */
interface TableInterface
{
    /**
     * Constructor
     * @param DaoInterface $dao DAO for execute query
     * @param string $tableName table name
     */
    public function __construct(DaoInterface $dao, string $tableName);
    
    /**
     * Insert new record, return record id if any
     * @param array $data
     * @return mixed
     */
    public function insert(array $data);
        
    /**
     * Update all records relevant to conditions (added before) by $data
     * @param array $data
     * @param mixed $where where statement (sugar for where())
     */
    public function update(array $data, $where = null);
    
    /**
     * Delete all records relevant to conditions (added before)
     * @param mixed $where where statement (sugar for where())
     */
    public function delete($where = null);
    
    /**
     * Find all records relevant to conditions (added before)
     * @param mixed $where where statement (sugar for where())
     * return iterator for all records
     * @return \Traversable
     */
    public function findAll($where = null) : \Traversable;
    
    /**
     * Find one records relevant to conditions (added before)
     * return one, first record
     * sugar for findAll
     * @param mixed $where where statement (sugar for where())
     * @return array
     */
    public function find($where = null) : array;
    
    /**
     * Return count of record relevant to conditions (added before)
     * @param mixed $where where statement (sugar for where())
     * @return int
     */
    public function count($where = null) : int;

    /**
     * Add where statement to query
     *
     * @return TableInterface
     */
    public function where(array $statement) : TableInterface;
    
    /**
     * Set order at query
     *
     * @param mixed $order array of order
     * @return TableInterface
     */
    public function order($order) : TableInterface;
    
    /**
     * Set limit of expected number of records
     * @param int $limit
     * @return TableInterface
     */
    public function limit($limit) : TableInterface;
    
    /**
     * Set offset for query from with start result
     * @param int $offset
     * @return TableInterface
     */
    public function offset($offset) : TableInterface;
    
    /**
     * Set fields list for find
     * @param array $fieldsList
     * @return TableInterface
     */
    public function fields(array $fieldsList) : TableInterface;
    
    /**
     * Enable distinct mode
     */
    public function distinct() : TableInterface;
    
    /**
     * Set default value of fields for insert
     * @param array $defaultRecord
     * @return TableInterface
     */
    public function defaultRecord(array $defaultRecord) : TableInterface;
}
