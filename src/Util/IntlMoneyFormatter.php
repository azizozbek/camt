<?php

namespace Genkgo\Camt\Util;

use Money\Currencies;
use Money\Money;
use Money\MoneyFormatter;
use NumberFormatter;

/**
 * Formats a Money object using intl extension.
 */
final class IntlMoneyFormatter implements MoneyFormatter
{
    private $currencies;
    private $formatter;

    public function __construct(NumberFormatter $formatter, Currencies $currencies)
    {
    }

    public function format(Money $money)
    {
        $valueBase = $money->getAmount();
        $negative  = $valueBase[0] === '-';

        if ($negative) {
            $valueBase = substr($valueBase, 1);
        }

        $subunit     = $this->currencies->subunitFor($money->getCurrency());
        $valueLength = strlen($valueBase);

        if ($valueLength > $subunit) {
            $formatted     = substr($valueBase, 0, $valueLength - $subunit);
            $decimalDigits = substr($valueBase, $valueLength - $subunit);

            if (strlen($decimalDigits) > 0) {
                $formatted .= '.' . $decimalDigits;
            }
        } else {
            $formatted = '0.' . str_pad('', $subunit - $valueLength, '0') . $valueBase;
        }

        if ($negative) {
            $formatted = '-' . $formatted;
        }

        $formatted = $this->formatter->formatCurrency((float) $formatted, $money->getCurrency()->getCode());

        assert($formatted !== '');

        return $formatted;
    }
}
