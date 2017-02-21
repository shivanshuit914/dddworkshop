<?php

/**
 * Class Product.
 *
 * @author        Shivanshu Patel <shivanshu.patel@worldfirst.com>
 * @copyright     2016 World First Ltd. All rights reserved.
 */
final class Product
{
    /**
     * @var SKU
     */
    private $sku;

    /**
     * @var Price
     */
    private $price;

    /**
     * Product constructor.
     * @param SKU $sku
     * @param Price $price
     */
    private function __construct(SKU $sku, Price $price)
    {
        $this->sku = $sku;
        $this->price = $price;
    }


    public static function withSKUAndPrice(SKU $sku, Price $price) : self
    {
        return new self($sku, $price);
    }
}