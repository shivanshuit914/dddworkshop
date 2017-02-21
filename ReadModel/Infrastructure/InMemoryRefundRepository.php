<?php

/**
 * Class InMemoryRefundRepository.
 *
 * @author        Shivanshu Patel <shivanshu.patel@worldfirst.com>
 * @copyright     2016 World First Ltd. All rights reserved.
 */
class InMemoryRefundRepository implements RefundRepositoryInterface
{
    private $counter;

    public function updateCounter()
    {
        $this->counter++;
    }

    public function findTotalRefunded()
    {
        return $this->counter;
    }
}