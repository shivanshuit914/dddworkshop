<?php

/**
 * Class RefundType.
 *
 * @author        Shivanshu Patel <shivanshu.patel@worldfirst.com>
 * @copyright     2016 World First Ltd. All rights reserved.
 */
final class RefundType
{

    /**
     * @var string
     */
    private $type;

    /**
     * RefundType constructor.
     * @param string $type
     */
    private function __construct(string  $type)
    {
        $this->type = $type;
    }


    /**
     * @return RefundType
     */
    public static function withCash() : self
    {
        return new  self('cash');
    }


    /**
     * @return RefundType
     */
    public static function withStoreCredit() : self
    {
        return new  self('store_credit');
    }


    /**
     * @return bool
     */
    public function isStoreCredit() : bool
    {
        return $this->type === 'store_credit';
    }
}