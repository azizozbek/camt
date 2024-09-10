<?php

namespace Genkgo\Camt\Util;

use IteratorAggregate;
use Money\Currency;
use Money\Exception\UnknownCurrencyException;
use Traversable;

/**
 * Implement this to provide a list of currencies.
 */
interface Currencies extends IteratorAggregate
{
    /**
     * Checks whether a currency is available in the current context.
     */
    public function contains(Currency $currency);

    /**
     * Returns the subunit for a currency.
     *
     * @throws UnknownCurrencyException If currency is not available in the current context.
     */
    public function subunitFor(Currency $currency);

    public function getIterator();
}
