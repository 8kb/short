<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace dao\pdo;

/**
 * Functionality for execute
 *
 * @author Mendel <mendel@zzzlab.com>
 */
trait ExecuteTrait
{
    /**
     * Execute request
     * @param string $sql
     * @param array $parameters
     */
    public function executeRead(string $sql, array $parameters) : \Traversable
    {
        $statement = $this->prepareStatement($sql);
        $isOk = $this->executeStatement($statement, $parameters);
        if (!$isOk) {
            throw new \PdoException($statement->errorInfo());
        }
        foreach ($statement as $line) {
            yield $line;
        }
        $statement->closeCursor();
    }
    
    /**
     * Execute request
     * @param string $sql
     * @param array $parameters
     */
    public function executeWrite(string $sql, array $parameters)
    {
        $statement = $this->prepareStatement($sql);
        $isOk = $this->executeStatement($statement, $parameters);
        if (!$isOk) {
            throw new \PdoException($statement->errorInfo());
        }
        $statement->closeCursor();
    }
    
    /**
     * Prepare statement
     * @param string $sql
     * @return \PDOStatement
     */
    protected function prepareStatement(string $sql) : \PDOStatement
    {
        $statement = $this->pdo->prepare($sql, [
            \PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL
        ]);
        $statement->setFetchMode(\PDO::FETCH_ASSOC);
        return $statement;
    }
    
    /**
     * Execute statement. Use param if exist
     * @param \PDOStatement $statement
     * @param array $parameters
     * @return bool
     */
    protected function executeStatement(\PDOStatement $statement, array $parameters) : bool
    {
        if ($parameters) {
            $param = $this->prepareParam($parameters);
            return $statement->execute($parameters);
        } else {
            return $statement->execute();
        }
    }

    /**
     * Prepare params (add ":" for each key at array)
     * @param array $parameters
     * @return array
     */
    protected function prepareParam(array $parameters) : array
    {
        $result = [];
        foreach ($parameters as $key => $value) {
            $key = ':' . (string) $key;
            $value = (string) $value;
            $result[$key] = $value;
        }
        return $result;
    }
    
    /**
     * Get last insert ID (for autoincrement etc)
     * @return mixed
     */
    public function lastInsertId()
    {
        return $this->pdo->lastInsertId();
    }
}
