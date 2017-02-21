<?php

/**
 * Class IssuedDate.
 *
 * @author        Shivanshu Patel <shivanshu.patel@worldfirst.com>
 * @copyright     2016 World First Ltd. All rights reserved.
 */
class IssuedDate
{
    private $date;

    public function __construct(DateTimeInterface $date)
    {
        $this->date = $date;
    }

    public static function withDate(DateTimeInterface $date)
    {
        return new self($date);
    }

    public function isWithinThirtyDays() : bool
    {
        $currentDate  = new DateTime();

        return ($currentDate->diff($this->date)->format('%a') < 30);
    }

    public function isWithinTwelveMonths() : bool
    {
        $currentDate  = new DateTime();

        return ($currentDate->diff($this->date)->m + ($currentDate->diff($this->date)->y * 12 ) < 12) ;
    }
}