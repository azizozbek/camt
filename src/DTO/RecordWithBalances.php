<?php

namespace Genkgo\Camt\DTO;

abstract class RecordWithBalances extends Record
{
    /**
     * @var Balance[]
     */
    private $balances = [];

    public function addBalance(Balance $balance)
    {
        $this->balances[] = $balance;
    }

    /**
     * @return Balance[]
     */
    public function getBalances()
    {
        return $this->balances;
    }
}
