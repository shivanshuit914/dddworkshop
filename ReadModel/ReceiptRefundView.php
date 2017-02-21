<?php

/**
 * Class ReceiptRefundView.
 *
 * @author        Shivanshu Patel <shivanshu.patel@worldfirst.com>
 * @copyright     2016 World First Ltd. All rights reserved.
 */
class ReceiptRefundView
{
    /**
     * @var int
     */
    public $count;

    /**
     * ReceiptRefundView constructor.
     * @param int $count
     */
    public function __construct(int $count)
    {
        $this->count = $count;
    }
}