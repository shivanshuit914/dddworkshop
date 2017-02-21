<?php

/**
 * Class ReceiptsRepositoryInterface.
 *
 * @author        Shivanshu Patel <shivanshu.patel@worldfirst.com>
 * @copyright     2016 World First Ltd. All rights reserved.
 */
interface RefundRepositoryInterface
{
    public function updateCounter();

    public function findTotalRefunded();
}