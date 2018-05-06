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
trait CommonTrait
{
    /**
     * Оборачиваем имя поля в кавычки.
     * @param string $id
     * @return string
     */
    protected function quoteId($id)
    {
        return "`".$id."`";
    }
    
    /**
     * Обернутое кавычками название таблицы :)
     * @return string
     */
    protected function table()
    {
        return $this->quoteId($this->tableName);
    }
    
    /**
     * Return statemetn always true
     */
    protected function trueStatement() : array
    {
        return ['1=1'];
    }
    
    /**
     * Return statement always false
     */
    protected function falseStatement() : array
    {
        return ['1=2'];
    }
        
    /**
     * Поклеим все условия в одно
     * @return string
     */
    protected function whereString()
    {
        return '('.implode(') AND (', $this->where). ')';
    }

    /**
     * Делаем условия из массива.
     * @param array $data
     * @return array
     */
    protected function array2where($data) : array
    {
        $mylist = [];
        foreach (array_keys($data) as $key) {
            $mylist[] = $this->quoteId($key) .'=:'.$key;
        }
        $data[0] = implode(' AND ', $mylist);
        return $data;
    }
}
