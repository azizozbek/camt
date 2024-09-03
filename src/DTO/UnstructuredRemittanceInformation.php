<?php

namespace Genkgo\Camt\DTO;

class UnstructuredRemittanceInformation
{
    private $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }
}
