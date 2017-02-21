<?php

/**
 * Class RollNumber.
 *
 * @author        Shivanshu Patel <shivanshu.patel@worldfirst.com>
 * @copyright     2016 World First Ltd. All rights reserved.
 */
class RollNumber
{
    private $string;

    public function __construct($string)
    {
        $this->string = $string;
    }

    public static function fromString(string  $string)
    {
        return new self($string);
    }
}