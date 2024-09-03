<?php

declare(strict_types=1);

namespace Genkgo\Camt\DTO;

use Money\Money;

class ChargesRecord
{
    private $amount;

    private $chargesIncludedIndicator = false;

    private $identification;

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($money)
    {
        $this->amount = $money;
    }

    public function getChargesIncludedIndicator()
    {
        return $this->chargesIncludedIndicator;
    }

    public function setChargesIncludedIndicator($chargesIncludedIndicator)
    {
        $this->chargesIncludedIndicator = $chargesIncludedIndicator;
    }

    public function getIdentification()
    {
        return $this->identification;
    }

    public function setIdentification($identification)
    {
        $this->identification = $identification;
    }
}
