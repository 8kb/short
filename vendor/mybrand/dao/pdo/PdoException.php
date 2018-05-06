<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace mybrand\dao\pdo;

/**
 * Exception for PDO error
 *
 * @author Mendel <mendel@zzzlab.com>
 */
class PdoException extends \Exception
{
    public function __construct(array $errorData)
    {
        $message = 'PDO Error! SQLSTATE: '. $errorData[0].' error: '. $errorData[2];
        parent::__construct($message);
    }
}
