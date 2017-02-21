<?php

/**
 * Class SKU.
 *
 * @author        Shivanshu Patel <shivanshu.patel@worldfirst.com>
 * @copyright     2016 World First Ltd. All rights reserved.
 */
final class SKU
{
    /**
     * @var string
     */
    private $string;

    /**
     * SKU constructor.
     * @param string $string
     */
    public function __construct(string  $string)
    {
        $this->string = $string;
    }

    public static function fromString(string $string) : self
    {
        return new self($string);
    }
}