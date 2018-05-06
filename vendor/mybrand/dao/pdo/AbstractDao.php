<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace mybrand\dao\pdo;

/**
 * DAO bootstrap based at PDO
 *
 * @author Mendel <mendel@zzzlab.com>
 */
abstract class AbstractDao implements \mybrand\dao\DaoInterface
{
    use ExecuteTrait, TransactionTrait;
    
    /**
     * @var \PDO
     */
    protected $pdo;

    /**
     * Constructor
     * @param string $dsn data source name
     * @param string $user username
     * @param string $password password
     * @param mixed $options options (fo PDO)
     */
    public function __construct(string $dsn, $user = null, $password = null, $options = null)
    {
        $this->pdo = new \PDO($dsn, $user, $password, $options);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
}
