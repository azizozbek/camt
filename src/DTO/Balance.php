<?php

namespace Genkgo\Camt\DTO;

use DateTimeImmutable;
use Genkgo\Camt\Util\IntlMoneyFormatter;
use Money\Money;

/**
 * Class Balance
 * @package Genkgo\Camt\DTO
 */
class Balance
{
    const TYPE_OPENING = 'opening';

    const TYPE_OPENING_AVAILABLE = 'opening_available';

    const TYPE_CLOSING = 'closing';

    const TYPE_CLOSING_AVAILABLE = 'closing_available';

    const TYPE_FORWARD_AVAILABLE = 'forward_available';

    const TYPE_INFORMATION = 'information';

    const TYPE_INTERIM = 'interim';

    const TYPE_INTERIM_AVAILABLE = 'interim_available';

    const TYPE_EXPECTED_CREDIT = 'expected_credit';

    /**
     * @var Money
     */
    private $amount;
    /**
     * @var string
     */
    private $type;

    /**
     * @var DateTimeImmutable
     */
    private $date;

    /**
     * @param $type
     * @param Money $amount
     * @param DateTimeImmutable $date
     */
    private function __construct($type, Money $amount, DateTimeImmutable $date)
    {
        $this->type = $type;
        $this->amount = $amount;
        $this->date = $date;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getAmount($decimal = false)
    {
        if ($decimal) {
            return (new IntlMoneyFormatter())->format($this->amount);
        }

        return $this->amount;
    }

    public function getType()
    {
        return $this->type;
    }

    public static function opening(Money $amount, DateTimeImmutable $date)
    {
        return new self(self::TYPE_OPENING, $amount, $date);
    }

    public static function openingAvailable(Money $amount, DateTimeImmutable $date)
    {
        return new self(self::TYPE_OPENING_AVAILABLE, $amount, $date);
    }

    public static function closing(Money $amount, DateTimeImmutable $date)
    {
        return new self(self::TYPE_CLOSING, $amount, $date);
    }

    public static function closingAvailable(Money $amount, DateTimeImmutable $date)
    {
        return new self(self::TYPE_CLOSING_AVAILABLE, $amount, $date);
    }

    public static function forwardAvailable(Money $amount, DateTimeImmutable $date)
    {
        return new self(self::TYPE_FORWARD_AVAILABLE, $amount, $date);
    }

    public static function information(Money $amount, DateTimeImmutable $date)
    {
        return new self(self::TYPE_INFORMATION, $amount, $date);
    }

    public static function interim(Money $amount, DateTimeImmutable $date)
    {
        return new self(self::TYPE_INTERIM, $amount, $date);
    }

    public static function interimAvailable(Money $amount, DateTimeImmutable $date)
    {
        return new self(self::TYPE_INTERIM_AVAILABLE, $amount, $date);
    }

    public static function expectedCredit(Money $amount, DateTimeImmutable $date)
    {
        return new self(self::TYPE_EXPECTED_CREDIT, $amount, $date);
    }
}
