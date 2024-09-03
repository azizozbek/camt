<?php

namespace Genkgo\Camt\DTO;

/**
 * Class RemittanceInformation
 * @package Genkgo\Camt\DTO
 */
class RemittanceInformation
{
    /**
     * @var string|null
     */
    private $message;

    /**
     * @var CreditorReferenceInformation|null
     */
    private $creditorReferenceInformation;

    /**
     * @param $message
     * @return static
     */
    private $unstructuredBlocks = [];

    public static function fromUnstructured($message)
    {
        $information = new self();
        $information->message = $message;

        return $information;
    }

    /**
     * @return CreditorReferenceInformation
     */
    public function getCreditorReferenceInformation()
    {
        return $this->creditorReferenceInformation;
    }

    /**
     * @param CreditorReferenceInformation $creditorReferenceInformation
     */
    public function setCreditorReferenceInformation($creditorReferenceInformation)
    {
        $this->creditorReferenceInformation = $creditorReferenceInformation;
        $this->message = $creditorReferenceInformation->getRef();
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @deprecated Use addStructuredBlock method instead
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function addStructuredBlock(StructuredRemittanceInformation $structuredRemittanceInformation)
    {
        $this->structuredBlocks[] = $structuredRemittanceInformation;
    }

    /**
     * @return StructuredRemittanceInformation[]
     */
    public function getStructuredBlocks()
    {
        return $this->structuredBlocks;
    }

    public function getStructuredBlock()
    {
        if (isset($this->structuredBlocks[0])) {
            return $this->structuredBlocks[0];
        }

        return null;
    }

    public function addUnstructuredBlock(UnstructuredRemittanceInformation $unstructuredRemittanceInformation)
    {
        $this->unstructuredBlocks[] = $unstructuredRemittanceInformation;
    }

    /**
     * @return UnstructuredRemittanceInformation[]
     */
    public function getUnstructuredBlocks()
    {
        return $this->unstructuredBlocks;
    }

    public function getUnstructuredBlock()
    {
        if (isset($this->unstructuredBlocks[0])) {
            return $this->unstructuredBlocks[0];
        }

        return null;
    }
}
