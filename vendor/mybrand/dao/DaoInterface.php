<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace mybrand\dao;

/**
 *
 * @author Mendel <mendel@zzzlab.com>
 */
interface DaoInterface
{
    
    /**
     * Return new Table for this DAO
     * @param string $tableName
     * @return TableInterface
     */
    public function table(string $tableName) : TableInterface;
}
