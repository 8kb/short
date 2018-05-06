<?php
namespace dao\pdo;

trait TransactionTrait
{

    /**
     * @var bool  is transaction started?
     */
    private $isStarted = false;
    
    /**
     * Start transaction
     */
    public function startTransaction()
    {
        if ($this->isStarted) {
            throw new \Exception('Transaction already started!');
        }
        $this->isStarted = true;
        $isOk = $this->pdo->beginTransaction();
        if (!$isOk) {
            throw new \Exception('Cant start transaction!');
        }
    }
    
    /**
     * Commit transaction
     */
    public function commit()
    {
        if (!$this->isStarted) {
            throw new \Exception('Transaction not started!');
        }
        $this->isStarted = false;
        $isOk = $this->pdo->commit();
        if (!$isOk) {
            throw new \Exception('Cant commit!');
        }
    }
    
    /**
     * RollBack transaction
     */
    public function rollBack()
    {
        if (!$this->isStarted) {
            throw new \Exception('Transaction not started!');
        }
        $this->isStarted = false;
        $isOk = $this->pdo->rollBack();
        if (!$isOk) {
            throw new \Exception('Cant rollback!');
        }
    }
}
