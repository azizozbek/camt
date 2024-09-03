<?php

namespace Genkgo\Camt\DTO;

use DateTimeImmutable;
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

    /**
     * @return DateTimeImmutable
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return Money
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param Money $amount
     * @param DateTimeImmutable $date
     * @return static
     */
    public static function opening(Money $amount, DateTimeImmutable $date)
    {
        return new static (self::TYPE_OPENING, $amount, $date);
    }

    /**
     * @param Money $amount
     * @param DateTimeImmutable $date
     * @return static
     */
    public static function closing(Money $amount, DateTimeImmutable $date)
    {
        return new static (self::TYPE_CLOSING, $amount, $date);
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
