<?php
namespace Genkgo\Camt\DTO;

class BankTransactionCode
{

    /**
     * @var ProprietaryBankTransactionCode|null
     */
    private $proprietary = null;

    /**
     * @var DomainBankTransactionCode|null
     */
    private $domain = null;

    public function getProprietary()
    {
        return $this->proprietary;
    }

    /**
     * @param ProprietaryBankTransactionCode $proprietary
     */
    public function setProprietary(ProprietaryBankTransactionCode $proprietary)
    {
        $this->proprietary = $proprietary;
    }

    /**
     * @return DomainBankTransactionCode
     */
    public function getDomain()
    {
        return $this->domain;
    }

    public function setDomain(DomainBankTransactionCode $domain)
    {
        $this->domain = $domain;
    }
}
