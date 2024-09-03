<?php

namespace Genkgo\Camt\DTO;

class StructuredRemittanceInformation
{
    private $creditorReferenceInformation = null;

    private $additionalRemittanceInformation = null;

    public function getAdditionalRemittanceInformation()
    {
        return $this->additionalRemittanceInformation;
    }

    public function setAdditionalRemittanceInformation($additionalRemittanceInformation)
    {
        $this->additionalRemittanceInformation = $additionalRemittanceInformation;
    }

    public function getCreditorReferenceInformation()
    {
        return $this->creditorReferenceInformation;
    }

    public function setCreditorReferenceInformation($creditorReferenceInformation)
    {
        $this->creditorReferenceInformation = $creditorReferenceInformation;
    }
}
