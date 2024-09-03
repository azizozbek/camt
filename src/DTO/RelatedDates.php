<?php

namespace Genkgo\Camt\DTO;

use DateTimeImmutable;

class RelatedDates
{
    private $acceptanceDateTime;

    public function getAcceptanceDateTime()
    {
        return $this->acceptanceDateTime;
    }

    public static function fromUnstructured(DateTimeImmutable $acceptanceDateTime)
    {
        $information = new self();
        $information->acceptanceDateTime = $acceptanceDateTime;

        return $information;
    }
}
