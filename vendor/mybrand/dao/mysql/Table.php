<?php
namespace mybrand\dao\mysql;

/**
 * MySql Table
 */
class Table extends \mybrand\dao\pdo\table\AbstractTable
{
    use CommonTrait, ReadTrait, WriteTrait;

    /**
     * Insert new record, return record id if any
     * @param array $data
     * @return mixed
     */
    public function insert(array $data)
    {
        $prepaderData = array_merge($this->defaultRecord, $data);
        $this->insertSql($prepaderData);
        $this->executeWrite();
        return $this->dao->lastInsertId();
    }

    /**
     * Update all records relevant to conditions (added before) by $data
     * @param array $data
     * @param mixed $where where statement (sugar for where())
     */
    public function update(array $data, $where = null)
    {
        if(!is_null($where)) {
            $this->where($where);
        }
        if (!$this->where) {
            $this->where = $this->falseStatement();
        }
        $this->updateSql($data);
        $this->executeWrite();
    }

    /**
     * Delete all records relevant to conditions (added before)
     * @param mixed $where where statement (sugar for where())
     */
    public function delete($where = null)
    {
        if(!is_null($where)) {
            $this->where($where);
        }
        if (!$this->where) {
            $this->where = $this->falseStatement();
        }
        $this->deleteSql();
        $this->executeWrite();
    }

    /**
     * Find all records relevant to conditions (added before)
     * return iterator for all records
     * @param mixed $where where statement (sugar for where())
     * @return \Traversable
     */
    public function findAll($where = null): \Traversable
    {
        if(!is_null($where)) {
            $this->where($where);
        }
        if (!$this->where) {
            $this->where = $this->trueStatement();
        }
        $fields = $this->prepareFields();
        $this->selectSql($fields);
        if ($this->limit) {
            $this->limitSql($this->limit, $this->offset);
        }
        $this->orderSql($this->order);
        return $this->executeRead();
    }

    /**
     * Find one records relevant to conditions (added before)
     * return one, first record
     * sugar for findAll
     * @param mixed $where where statement (sugar for where())
     * @return array
     */
    public function find($where = null): array
    {
        if(!is_null($where)) {
            $this->where($where);
        }
        $this->limit(1);
        $result = $this->findAll();
        $record = $result->current();
        if(empty($record)) {
            $record = [];
        }
        return $record;
//        return $result->current();
    }
    
    /**
     * Return count of record relevant to conditions (added before)
     * @param mixed $where where statement (sugar for where())
     * @return int
     */
    public function count($where = null): int
    {
        if(!is_null($where)) {
            $this->where($where);
        }
        if (!$this->where) {
            $this->where = $this->trueStatement();
        }
        $this->countSql();
        $result = $this->executeRead()->current();
        return $result['cnt'];
    }
}
