<?php

namespace Genkgo\Camt\DTO;

class DomainFamilyBankTransactionCode
{
    private $code;

    private $subFamilyCode;

    public function __construct($code, $subFamilyCode)
    {
        $this->code = $code;
        $this->subFamilyCode = $subFamilyCode;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function getSubFamilyCode()
    {
        return $this->subFamilyCode;
    }

    public function setSubFamilyCode($issuer)
    {
        $this->subFamilyCode = $issuer;
    }
}
