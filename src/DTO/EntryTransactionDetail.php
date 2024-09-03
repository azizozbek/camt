<?php

namespace Genkgo\Camt\DTO;

use BadMethodCallException;

/**
 * Class EntryTransactionDetail
 * @package Genkgo\Camt\DTO
 */
class EntryTransactionDetail
{
    /**
     * @var Reference[]
     */
    private $references = [];
    /**
     * @var RelatedParty[]
     */
    private $relatedParties = [];
    /**
     * @var RelatedAgent[]
     */
    private $relatedAgents = [];
    /**
     * @var RemittanceInformation
     */
    private $remittanceInformation;
    /**
     * @var ReturnInformation
     */
    private $returnInformation;
    /**
     * @var AdditionalTransactionInformation
     */
    private $additionalTransactionInformation;

    /**
     * @var BankTransactionCode
     */
    private $bankTransactionCode;

    /**
     * @var AmountDetails
     */
    private $amountDetails;

    /**
     * @var Charges $charges
     */
    private $charges = null;

    /**
     * @var Money $amount
     */
    private $amount = null;

    private $creditDebitIndicator = null;

    /**
     * @var RelatedDates|null $relatedDates
     */
    private $relatedDates = null;
    /**
     * @param Reference $reference
     */
    public function setReference(Reference $reference)
    {
        $this->references[] = $reference;
    }

    /**
     * @return Reference[]
     */
    public function getReferences()
    {
        return $this->references;
    }

    /**
     * @return Reference
     * @throws BadMethodCallException
     */
    public function getReference()
    {
        if (isset($this->references[0])) {
            return $this->references[0];
        } else {
            throw new BadMethodCallException('There are no references at all for this transaction');
        }
    }

    /**
     * @param RelatedParty $relatedParty
     */
    public function addRelatedParty(RelatedParty $relatedParty)
    {
        $this->relatedParties[] = $relatedParty;
    }

    /**
     * @return RelatedParty[]
     */
    public function getRelatedParties()
    {
        return $this->relatedParties;
    }

    /**
     * @return RelatedParty
     * @throws BadMethodCallException
     */
    public function getRelatedParty()
    {
        if (isset($this->relatedParties[0])) {
            return $this->relatedParties[0];
        } else {
            throw new BadMethodCallException('There are no related parties at all for this transaction');
        }
    }

    /**
     * @param RelatedAgent $relatedAgent
     */
    public function addRelatedAgent(RelatedAgent $relatedAgent)
    {
        $this->relatedAgents[] = $relatedAgent;
    }

    /**
     * @return RelatedAgent[]
     */
    public function getRelatedAgents()
    {
        return $this->relatedAgents;
    }

    /**
     * @return RelatedAgent
     * @throws BadMethodCallException
     */
    public function getRelatedAgent()
    {
        if (isset($this->relatedAgents[0])) {
            return $this->relatedAgents[0];
        } else {
            throw new BadMethodCallException('There are no related agents at all for this transaction');
        }
    }

    /**
     * @param RemittanceInformation $remittanceInformation
     */
    public function setRemittanceInformation(RemittanceInformation $remittanceInformation)
    {
        $this->remittanceInformation = $remittanceInformation;
    }

    /**
     * @param RelatedDates|null $relatedDates
     * @return void
     */
    public function setRelatedDates($relatedDates)
    {
        $this->relatedDates = $relatedDates;
    }

    public function getRelatedDates()
    {
        return $this->relatedDates;
    }

    /**
     * @return RemittanceInformation
     */
    public function getRemittanceInformation()
    {
        if ($this->remittanceInformation === null) {
            throw new BadMethodCallException();
        }
        return $this->remittanceInformation;
    }

    /**
     * @return ReturnInformation|null
     */
    public function getReturnInformation()
    {
        return $this->returnInformation;
    }

    /**
     * @param ReturnInformation $information
     */
    public function setReturnInformation(ReturnInformation $information)
    {
        $this->returnInformation = $information;
    }

    /**
     * @param AdditionalTransactionInformation $additionalTransactionInformation
     */
    public function setAdditionalTransactionInformation(AdditionalTransactionInformation $additionalTransactionInformation)
    {
        $this->additionalTransactionInformation = $additionalTransactionInformation;
    }

    /**
     * @return AdditionalTransactionInformation
     */
    public function getAdditionalTransactionInformation()
    {
        if ($this->additionalTransactionInformation === null) {
            throw new BadMethodCallException();
        }
        return $this->additionalTransactionInformation;
    }

    /**
     * @return BankTransactionCode
     */
    public function getBankTransactionCode()
    {
        return $this->bankTransactionCode;
    }

    /**
     * @param BankTransactionCode $bankTransactionCode
     */
    public function setBankTransactionCode(BankTransactionCode $bankTransactionCode)
    {
        $this->bankTransactionCode = $bankTransactionCode;
    }

    public function getCharges()
    {
        return $this->charges;
    }

    public function setCharges($charges)
    {
        $this->charges = $charges;
    }

    /**
     * @return AmountDetails
     */
    public function getAmountDetails()
    {
        return $this->amountDetails;
    }

    public function setAmountDetails($amountDetails)
    {
        $this->amountDetails = $amountDetails;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    public function getCreditDebitIndicator()
    {
        return $this->creditDebitIndicator;
    }

    public function setCreditDebitIndicator( $creditDebitIndicator)
    {
        $this->creditDebitIndicator = $creditDebitIndicator;
    }
}
