<?php

namespace Genkgo\Camt\DTO;

use DateTimeImmutable;

/**
 * Class GroupHeader
 * @package Genkgo\Camt\DTO
 */
class GroupHeader
{
    /**
     * @var string
     */
    private $messageId;

    /**
     * @var DateTimeImmutable
     */
    private $createdOn;

    /**
     * @var string|null
     */
    private $additionalInformation;

    /**
     * @var Recipient|null
     */
    private $messageRecipient;

    /**
     * @param $messageId
     * @param DateTimeImmutable $createdOn
     */
    public function __construct($messageId, DateTimeImmutable $createdOn)
    {
        $this->messageId = $messageId;
        $this->createdOn = $createdOn;
    }

    /**
     * @return string
     */
    public function getMessageId()
    {
        return $this->messageId;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * @return string|null
     */
    public function getAdditionalInformation()
    {
        return $this->additionalInformation;
    }

    /**
     * @param string $additionalInformation
     */
    public function setAdditionalInformation($additionalInformation)
    {
        $this->additionalInformation = $additionalInformation;
    }

    /**
     * @return Recipient|null
     */
    public function getMessageRecipient()
    {
        return $this->messageRecipient;
    }

    /**
     * @param Recipient $messageRecipient
     */
    public function setMessageRecipient(Recipient $messageRecipient)
    {
        $this->messageRecipient = $messageRecipient;
    }

    public function getPagination()
    {
        return $this->pagination;
    }

    public function setPagination($pagination)
    {
        $this->pagination = $pagination;
    }
}
