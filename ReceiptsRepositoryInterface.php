<?php

/**
 * Class ReceiptsRepositoryInterface.
 *
 * @author        Shivanshu Patel <shivanshu.patel@worldfirst.com>
 * @copyright     2016 World First Ltd. All rights reserved.
 */
interface ReceiptsRepositoryInterface
{
    /**
     * @param RollNumber $rollNumber
     * @return Receipt
     */
    public function findByRollNumber(RollNumber $rollNumber) : Receipt;

    /**
     * @param Receipt $receipt
     * @return mixed
     */
    public function save(Receipt $receipt);
}