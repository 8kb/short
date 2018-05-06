<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace mybrand\dao\pdo\table;

/**
 *
 * @author Mendel <mendel@zzzlab.com>
 */
trait ModifierTrait
{
    protected $defaultRecord = [];
    protected $fields = [];
    protected $limit = null;
    protected $offset = null;
    protected $order = null;
    protected $distinct = false;

    /**
     * Set default value of fields for insert
     * @param array $defaultRecord
     * @return \mybrand\dao\TableInterface
     */
    public function defaultRecord(array $defaultRecord): \mybrand\dao\TableInterface
    {
        $this->defaultRecord = $defaultRecord;
        return $this;
    }

    /**
     * Set fields list for find
     * @param array $fieldsList
     * @return \mybrand\dao\TableInterface
     */
    public function fields(array $fieldsList): \mybrand\dao\TableInterface
    {
        $this->fields = $fieldsList;
        return $this;
    }

    /**
     * Set limit of expected number of records
     * @param int $limit
     * @return \mybrand\dao\TableInterface
     */
    public function limit($limit): \mybrand\dao\TableInterface
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * Set offset for query from with start result
     * @param int $offset
     * @return \mybrand\dao\TableInterface
     */
    public function offset($offset): \mybrand\dao\TableInterface
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * Set order at query
     *
     * @param mixed $order array of order
     * @return \mybrand\dao\TableInterface
     */
    public function order($order): \mybrand\dao\TableInterface
    {
        $this->order = $order;
        return $this;
    }
    
    /**
     * Enadle distinct mode
     */
    public function distinct() : \mybrand\dao\TableInterface
    {
        $this->distinct = true;
        return $this;
    }
}
