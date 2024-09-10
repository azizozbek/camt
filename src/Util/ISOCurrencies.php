<?php

namespace Genkgo\Camt\Util;
use ArrayIterator;
use Money\Currency;
use Money\Exception\UnknownCurrencyException;
use RuntimeException;
use Traversable;

/**
 * List of supported ISO 4217 currency codes and names.
 */
final class ISOCurrencies implements Currencies
{
    /**
     * Map of known currencies indexed by code.
     *
     * @psalm-var non-empty-array<non-empty-string, array{
     *     alphabeticCode: non-empty-string,
     *     currency: non-empty-string,
     *     minorUnit: non-negative-int,
     *     numericCode: positive-int
     * }>|null
     */
    private static $currencies = null;

    public function contains(Currency $currency)
    {
        return isset($this->getCurrencies()[$currency->getName()]);
    }

    public function subunitFor(Currency $currency)
    {
        if (! $this->contains($currency)) {
            throw new UnknownCurrencyException('Cannot find ISO currency ' . $currency->getName());
        }

        return $this->getCurrencies()[$currency->getName()]['minorUnit'];
    }

    /**
     * Returns the numeric code for a currency.
     *
     * @throws UnknownCurrencyException If currency is not available in the current context.
     */
    public function numericCodeFor(Currency $currency)
    {
        if (! $this->contains($currency)) {
            throw new UnknownCurrencyException('Cannot find ISO currency ' . $currency->getName());
        }

        return $this->getCurrencies()[$currency->getName()]['numericCode'];
    }

    /**
     * @psalm-return Traversable<int, Currency>
     */
    public function getIterator()
    {
        return new ArrayIterator(
            array_map(
                static function ($code) {
                    return new Currency($code);
                },
                array_keys($this->getCurrencies())
            )
        );
    }

    /**
     * Returns a map of known currencies indexed by code.
     *
     * @psalm-return non-empty-array<non-empty-string, array{
     *     alphabeticCode: non-empty-string,
     *     currency: non-empty-string,
     *     minorUnit: non-negative-int,
     *     numericCode: positive-int
     * }>
     */
    private function getCurrencies()
    {
        if (self::$currencies === null) {
            self::$currencies = $this->loadCurrencies();
        }

        return self::$currencies;
    }

    /**
     * @psalm-return non-empty-array<non-empty-string, array{
     *     alphabeticCode: non-empty-string,
     *     currency: non-empty-string,
     *     minorUnit: non-negative-int,
     *     numericCode: positive-int
     * }>
     */
    private function loadCurrencies()
    {
        $file = __DIR__ . '/currency.php';

        if (is_file($file)) {
            return require $file;
        }

        throw new RuntimeException('Failed to load currency ISO codes.');
    }
}
