<?php

namespace Genkgo\Camt\Util;

use SimpleXMLElement;

final class MoneyFactory
{
    private $decimalMoneyParser;

    public function __construct()
    {
        $this->decimalMoneyParser = new DecimalMoneyParser(new ISOCurrencies());
    }

    public function create(SimpleXMLElement $xmlAmount, $CdtDbtInd)
    {
        $amount = (string) $xmlAmount;

        if ((string) $CdtDbtInd === 'DBIT') {
            $amount = (string) ((float) $amount * -1);
        }

        /** @psalm-var non-empty-string $currency */
        $currency = (string) $xmlAmount['Ccy'];

        return $this->decimalMoneyParser->parse(
            $amount,
            new Currency($currency)
        );
    }
}
