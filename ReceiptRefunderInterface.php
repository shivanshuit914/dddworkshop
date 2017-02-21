<?php

/**
 * Class ReceiptRefunderInterface.
 *
 * @author        Shivanshu Patel <shivanshu.patel@worldfirst.com>
 * @copyright     2016 World First Ltd. All rights reserved.
 */
interface ReceiptRefunderInterface
{
    /**
     * @param string $rollNumber
     */
    public function refund(string $rollNumber);
}