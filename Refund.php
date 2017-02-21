<?php

/**
 * Class Refund.
 *
 * @author        Shivanshu Patel <shivanshu.patel@worldfirst.com>
 * @copyright     2016 World First Ltd. All rights reserved.
 */
class Refund
{
    private $rollNumber;

    private $sku;


    private function __construct()
    {
    }


    public static function receipt(Receipt $receipt)
    {
        return new Refund();
    }

    public static function products(Receipt $receipt, Product $product)
    {
        return new Refund();
    }

    private function isReceiptRefunded()
    {
        return $this->rollNumber === 'refunded';
    }

    private function isProductRefunded()
    {

    }
}