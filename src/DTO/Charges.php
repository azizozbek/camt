<?php

namespace Genkgo\Camt\DTO;

use Money\Money;

class Charges
{
    private $totalChargesAndTaxAmount = null;

    /**
     * @var ChargesRecord[]
     */
    private $records = [];

    public function getTotalChargesAndTaxAmount()
    {
        return $this->totalChargesAndTaxAmount;
    }

    public function setTotalChargesAndTaxAmount(Money $money)
    {
        $this->totalChargesAndTaxAmount = $money;
    }

    public function addRecord(ChargesRecord $record)
    {
        $this->records[] = $record;
    }

    /**
     * @return ChargesRecord[]
     */
    public function getRecords()
    {
        return $this->records;
    }

    public function getRecord()
    {
        if (isset($this->records[0])) {
            return $this->records[0];
        }

        return null;
    }
}
