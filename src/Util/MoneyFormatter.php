<?php

namespace Genkgo\Camt\Util;

use Money\Money;

/**
 * Formats Money objects.
 */
interface MoneyFormatter
{
    /**
     * Formats a Money object as string.
     *
     * @psalm-return non-empty-string
     *
     * Exception\FormatterException
     */
    public function format(Money $money);
}
