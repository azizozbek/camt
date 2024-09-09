<?php

namespace Genkgo\Camt\DTO;

use Genkgo\Camt\Iban;

/**
 * Class IbanAccount
 * @package Genkgo\Camt\DTO
 */
class IbanAccount extends Account
{
    /**
     * @var Iban
     */
    private $iban;

    /**
     * @var Servicer
     */
    private $servicer;
    /**
     * @param Iban $iban
     */
    public function __construct(Iban $iban)
    {
        $this->iban = $iban;
    }

    /**
     * @return Iban
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * @return Servicer
     */
    public function getServicer()
    {
        return $this->servicer;
    }

    /**
     * @param Servicer $servicer
     */
    public function setServicer($servicer)
    {
        $this->servicer = $servicer;
    }

    /**
     * {@inheritdoc}
     */
    public function getIdentification()
    {
        return (string) $this->iban;
    }
}
