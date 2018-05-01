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
trait WriteTrait
{
    /**
     * Генерируем запрос на Инсерт, т.е. добавление новой записи в таблицу
     * @param array $data
     */
    protected function insertSql($data)
    {
        $set = $this->fields2set($data, 'field_');
        $this->parameters = $this->prefixParam($data, 'field_');
        //
        $this->sql = 'INSERT '.$this->table().' SET '.$set;
    }
    
    /**
     * Генерируем запрос на Апдейт, т.е. редактирование уже существующей записи (или записЕЙ)
     * удовлетворяющих условию  (указанному ранее)
     * @param array $data
     */
    public function updateSql(array $data)
    {
        $set = $this->fields2set($data, 'field_');
        $dataParam = $this->prefixParam($data, 'field_');
        $this->parameters = array_merge($this->parameters, $dataParam);
        $sql = 'UPDATE '.$this->table().' SET '.$set.' WHERE '.$this->whereString();
        $this->sql = $sql;
    }
    
    /**
     * Добавляет к именам параметров указанный префикс
     * @param array $data
     * @param string $prefix
     * @return array
     */
    protected function prefixParam($data, $prefix)
    {
        $out = [];
        foreach ($data as $key => $value) {
            $out[$prefix.$key] = $value;
        }
        return $out;
    }
    
    /**
     * Делаем из массива подготовленный список полей с именами параметров вместо значений
     * для передачи потом в запрос.
     * $fields = ['name'=>'namedata','value'=>'valuedata']
     * return: `name` = :prefixname, `value` = :prefixvalue
     *
     * @param type $fields
     * @param type $prefix
     * @return type
     */
    protected function fields2set($fields, $prefix = '')
    {
        $mylist = [];
        foreach (array_keys($fields) as $key) {
            $mylist[] = $this->quoteId($key) .'=:'.$prefix.$key;
        }
        return implode(' , ', $mylist);
    }
    
    /**
     * Генерируем запрос на удаление записи соответственно условию переданному ранее.
     */
    protected function deleteSql()
    {
        if (!$this->where) {
            $this->where(false); // чтобы случайно не убить всех
        }
        $this->sql = 'DELETE FROM '.$this->table().' WHERE '.$this->whereString();
        return $this;
    }
}
