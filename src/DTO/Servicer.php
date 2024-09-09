<?php

namespace Genkgo\Camt\DTO;

/**
 * Class BBANAccount
 * @package Genkgo\Camt
 */
class Servicer extends Account
{

    /**
     * @var string
     */
    private $bic;

    /**
     * @var string
     */
    private $name;

    /**
     * @var OtherAccount
     */
    private $otherAccount;

    public function __construct($bic)
    {
        $this->bic = $bic;
    }

    /**
     * @return string
     */
    public function getBic()
    {
        return $this->bic;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return OtherAccount
     */
    public function getOtherAccount()
    {
        return $this->otherAccount;
    }

    /**
     * @param OtherAccount $otherAccount
     */
    public function setOtherAccount($otherAccount)
    {
        $this->otherAccount = $otherAccount;
    }

    public function getIdentification()
    {
        return $this->bic;
    }
}
