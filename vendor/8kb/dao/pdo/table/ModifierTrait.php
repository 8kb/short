<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace dao\pdo\table;

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
     * @return \dao\TableInterface
     */
    public function defaultRecord(array $defaultRecord): \dao\TableInterface
    {
        $this->defaultRecord = $defaultRecord;
        return $this;
    }

    /**
     * Set fields list for find
     * @param array $fieldsList
     * @return \dao\TableInterface
     */
    public function fields(array $fieldsList): \dao\TableInterface
    {
        $this->fields = $fieldsList;
        return $this;
    }

    /**
     * Set limit of expected number of records
     * @param int $limit
     * @return \dao\TableInterface
     */
    public function limit($limit): \dao\TableInterface
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * Set offset for query from with start result
     * @param int $offset
     * @return \dao\TableInterface
     */
    public function offset($offset): \dao\TableInterface
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * Set order at query
     *
     * @param mixed $order array of order
     * @return \dao\TableInterface
     */
    public function order($order): \dao\TableInterface
    {
        $this->order = $order;
        return $this;
    }
    
    /**
     * Enadle distinct mode
     */
    public function distinct() : \dao\TableInterface
    {
        $this->distinct = true;
        return $this;
    }
}
