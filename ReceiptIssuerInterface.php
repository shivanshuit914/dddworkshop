<?php

/**
 * interface ReceiptIssuerInterface.
 *
 * @author        Shivanshu Patel <shivanshu.patel@worldfirst.com>
 * @copyright     2016 World First Ltd. All rights reserved.
 */
interface ReceiptIssuerInterface
{
    /**
     * @param string $rollNumber
     * @param DateTimeInterface $issueDate
     * @param array $products
     */
    public function issue(string $rollNumber, DateTimeInterface $issueDate, array $products);
}