<?php

/**
 * Class Price.
 *
 * @author        Shivanshu Patel <shivanshu.patel@worldfirst.com>
 * @copyright     2016 World First Ltd. All rights reserved.
 */
final class Price
{

    /**
     * @var int
     */
    private $amount;

    /**
     * Price constructor.
     *
     * @param $amount
     */
    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @param int $amount
     * @return Price
     */
    public static function withAmount($amount) : self
    {
        if ($amount <= 0) {
            throw new InvalidArgumentException('amount should be greatre than 0');
        }

        return new self($amount);
    }
}