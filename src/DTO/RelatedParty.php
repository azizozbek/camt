<?php

namespace Genkgo\Camt\DTO;

use BadMethodCallException;

/**
 * Class RelatedParty
 * @package Genkgo\Camt\DTO
 */
class RelatedParty
{
    /**
     * @var RelatedPartyTypeInterface
     */
    private $relatedPartyDetails;
    /**
     * @var Account|null

     */
    private $account;

    /**
     * @param RelatedPartyTypeInterface $relatedPartyDetails
     * @param Account $account
     */
    public function __construct(RelatedPartyTypeInterface $relatedPartyDetails, Account $account = null)
    {
        $this->relatedPartyDetails = $relatedPartyDetails;
        $this->account = $account;
    }

    /**
     * @return RelatedPartyTypeInterface
     */
    public function getRelatedPartyType()
    {
        return $this->relatedPartyDetails;
    }

    /**
     * @return Account|null
     */
    public function getAccount()
    {
        return $this->account;
    }
}
