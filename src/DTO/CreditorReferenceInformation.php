<?php

namespace Genkgo\Camt\DTO;

/**
 * Class CreditorReferenceInformation
 * @package Genkgo\Camt\DTO
 */
class CreditorReferenceInformation
{
    /**
     * @var string
     */
    private $ref;

    private $proprietary = null;

    private $code = null;
    /**
     * @return string
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * @param string $ref
     */
    public function setRef($ref)
    {
        $this->ref = $ref;
    }

    /**
     * @param $ref
     *
     * @return static
     */
    public static function fromUnstructured($ref)
    {
        $information = new static;
        $information->ref = $ref;
        return $information;
    }

    public function getProprietary()
    {
        return $this->proprietary;
    }

    public function setProprietary($proprietary)
    {
        $this->proprietary = $proprietary;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }
}
