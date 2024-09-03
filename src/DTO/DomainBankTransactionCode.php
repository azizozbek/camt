<?php

namespace Genkgo\Camt\DTO;

class DomainBankTransactionCode
{
    private $code;

    private $family;

    public function __construct($code)
    {
        $this->code = $code;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function getFamily()
    {
        return $this->family;
    }

    public function setFamily(DomainFamilyBankTransactionCode $family)
    {
        $this->family = $family;
    }
}
