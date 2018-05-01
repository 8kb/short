<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace dao\mysql;

/**
 *
 * @author Mendel <mendel@zzzlab.com>
 */
trait ReadTrait
{
    /**
     * Генерируем запрос на выбор всех записей удовлетворяющих условию,
     * выбирает только те поля что указаны
     * @param string $fields
     */
    protected function selectSql($fields)
    {
        if ($this->distinct) {
            $fields = ' DISTINCT '.$fields;
        }
        $this->sql = 'SELECT '.$fields.' FROM '.$this->table().' WHERE '.$this->whereString();
    }
    
    protected function prepareFields()
    {
        if ($this->fields) {
            foreach ($this->fields as $key => $value) {
                $this->fields[$key] = $this->quoteId($value);
            }
            $fields = implode(' , ', $this->fields);
        } else {
            $fields = ' * ';
        }
        return $fields;
    }

        /**
     * Генерирует запрос на вычисление количества записей удовлетворяющих условию
     * переданному ранее
     */
    protected function countSql()
    {
        $this->selectSql('COUNT(*) as cnt');
    }
    
    /**
     * Передает порядок сортировки
     *
     * @param mixed $orders массив полей по которым сортируем
     */
    protected function orderSql($orders)
    {
        if ($orders) {
            $this->sql .= ' ORDER BY ';
            foreach ($orders as $key => $value) {
                $orders[$key] = $this->prepareOrder($value);
            }
            $this->sql .= implode(', ', $orders);
        }
    }
    
    /**
     * Обрабатывает один элемент сортировки и  добавляет ему указание направления
     * @param string $order
     * @return string
     */
    protected function prepareOrder($order)
    {
        if ($order{0}=='!') {
            $field = substr($order, 1);
            $result = $this->quoteId($field).' DESC';
        } else {
            $result = $this->quoteId($order).' ASC';
        }
        return $result;
    }
    
    /**
     * Меняем колво записей ожидаемых запросом, и номер с записи с которой начинаем данные
     * @param int $limit
     * @param int $offset
     */
    public function limitSql($limit, $offset = null)
    {
        $this->sql .= ' LIMIT ';
        if ($offset) {
            $this->sql .= intval($offset).','.intval($limit);
        } else {
            $this->sql .= intval($limit);
        }
    }
}
