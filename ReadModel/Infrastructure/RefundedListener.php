<?php

/**
 * Class RefundedListner.
 *
 * @author        Shivanshu Patel <shivanshu.patel@worldfirst.com>
 * @copyright     2016 World First Ltd. All rights reserved.
 */
class RefundedListener implements ListenerInterface
{
    /**
     * @var InMemoryRefundRepository
     */
    private $refundRepository;

    /**
     * RefundedListener constructor.
     * @param InMemoryRefundRepository $refundRepository
     */
    public function __construct(InMemoryRefundRepository $refundRepository)
    {
        $this->refundRepository = $refundRepository;
    }

    public function handle($event)
    {
        if (!$event instanceof ReceiptRefunded) {
            return;
        }

        $refundType = 'cash';
        if ($event->refundType->isStoreCredit())
        {
            $refundType = 'store_credit';
        }


        $this->refundRepository->updateCounter();
    }
}