<?php

/**
 * Class ReceiptRefunded.
 *
 * @author        Shivanshu Patel <shivanshu.patel@worldfirst.com>
 * @copyright     2016 World First Ltd. All rights reserved.
 */
class ReceiptRefunded
{
    /**
     * @var RollNumber
     */
    public $receiptRollNumber;

    /**
     * @var RefundType
     */
    public $refundType;

    /**
     * ReceiptRefunded constructor.
     * @param RollNumber $receiptRollNumber
     * @param RefundType $refundType
     */
    public function __construct(RollNumber $receiptRollNumber, RefundType  $refundType)
    {
        $this->receiptRollNumber = $receiptRollNumber;
        $this->refundType = $refundType;
    }
}