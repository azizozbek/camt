<?php
namespace Genkgo\Camt\Camt053;

class AdditionalTransactionInformation
{

    private $information;

    public function __construct($information)
    {
        $this->information = $information;
    }

    public function __toString()
    {
        return (string) $this->information;
    }
}
