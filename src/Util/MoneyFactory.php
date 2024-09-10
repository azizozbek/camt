<?php

namespace Genkgo\Camt\Util;

use SimpleXMLElement;
use Money\Money;
use Money\Currency;

final class MoneyFactory
{

    public function create(SimpleXMLElement $xmlAmount, $CdtDbtInd)
    {
        $amount = (string) $xmlAmount;

        if ((string) $CdtDbtInd === 'DBIT') {
            $amount = (string) ((float) $amount * -1);
        }
        
        return new Money(Money::stringToUnits($amount), new Currency($xmlAmount['Ccy']->__toString()));
    }
}
