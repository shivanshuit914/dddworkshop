<?php

require_once 'RefundType.php';

/**
 * Class Receipt.
 *
 * @author        Shivanshu Patel <shivanshu.patel@worldfirst.com>
 * @copyright     2016 World First Ltd. All rights reserved
 */
final class Receipt
{
    /**
     * @var array
     */
    private $products;

    /**
     * @var RollNumber
     */
    private $rollNumber;

    /***
     * @var IssuedDate
     */
    private $issuedDate;

    /**
     * @var string
     */
    private $status;

    /**
     * @var RefundType
     */
    private $refundType;

    /**
     * @var array
     */
    private $event;


    /**
     * Receipt constructor.
     *
     * @param array      $products
     * @param RollNumber     $rollNumber
     * @param IssuedDate $issuedDate
     */
    public function __construct(array $products, RollNumber $rollNumber, IssuedDate $issuedDate)
    {
        $this->products = $products;
        $this->rollNumber = $rollNumber;
        $this->issuedDate = $issuedDate;

    }

    /**
     * @param array      $products
     * @param RollNumber     $rollNumber
     * @param IssuedDate $issuedDate
     *
     * @return Receipt
     */
    public static function issueWith(array $products, RollNumber $rollNumber, IssuedDate $issuedDate) : self
    {
        return new self($products, $rollNumber, $issuedDate);
    }

    public function refundForCash()
    {
        if ($this->isAlreadyRefunded()) {
            throw new Exception('already refunded');
        }

        if ($this->issuedDate->isWithinThirtyDays()) {
            $this->status = 'refunded';
            $this->refundType = RefundType::withCash();


            // Dispatch refundCash event
            $this->raise();

            return;
        }

        throw new Exception('can not refund for cash');
    }

    public function refundStoreCredit()
    {
        if ($this->isAlreadyRefunded()) {
            throw new Exception('already refunded');
        }

        if ($this->issuedDate->isWithinTwelveMonths()) {
            $this->status = 'refunded';
            $this->refundType = RefundType::withStoreCredit();

            // Dispatch refundStoreCredit event
            $this->raise();

            return;
        }

        throw new Exception('can not refund for store credit');
    }


    private function raise()
    {
        $receiptRefunded = new ReceiptRefunded(
            $this->rollNumber,
            $this->refundType
        );

        $this->event[] = $receiptRefunded;
    }

    public function newEvents()
    {
        return $this->event;
    }

    private function isAlreadyRefunded() : bool
    {
        return $this->status === 'refunded';
    }

    public function hasRollNumber(RollNumber $rollNumber) : bool
    {
        return $this->rollNumber == $rollNumber;
    }
}
