<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace mybrand\dao\mysql;

/**
 *
 *
 * @author Mendel <mendel@zzzlab.com>
 */
class Dao extends \mybrand\dao\pdo\AbstractDao
{
    /**
     * Constructor
     * @param string $host
     * @param string $dbname
     * @param string $user
     * @param string $password
     */
    public function __construct(string $host, string $dbname, $user = null, $password = null)
    {
        $dsn = 'mysql:host='.$host.';dbname='.$dbname.';charset=UTF8';
        $options = [\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''];
        parent::__construct($dsn, $user, $password, $options);
    }

    /**
     * Return new Table for this DAO
     * @param string $tableName
     * @return Table
     */
    public function table(string $tableName) : \mybrand\dao\TableInterface
    {
        return new Table($this, $tableName);
    }
}
