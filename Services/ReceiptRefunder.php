<?php

/**
 * Class ReceiptRefunder.
 *
 * @author        Shivanshu Patel <shivanshu.patel@worldfirst.com>
 * @copyright     2016 World First Ltd. All rights reserved.
 */
class ReceiptRefunder implements ReceiptRefunderInterface
{
    /**
     * @var ReceiptsRepositoryInterface
     */
    private $receiptsRepository;

    /**
     * @var EventBus
     */
    private $eventBus;

    /**
     * ReceiptRefunder constructor.
     * @param ReceiptsRepositoryInterface $receiptsRepository
     * @param EventBus $eventBus
     */
    public function __construct(
        ReceiptsRepositoryInterface $receiptsRepository,
        EventBus $eventBus
    ) {
        $this->receiptsRepository = $receiptsRepository;
        $this->eventBus = $eventBus;
    }

    /**
     * @param string $rollNumber
     */
    public function refund(string  $rollNumber)
    {
        $rollNumber = RollNumber::fromString($rollNumber);
        $receipt = $this->receiptsRepository->findByRollNumber($rollNumber);

        $receipt->refundForCash();
        $this->receiptsRepository->save($receipt);
        $this->eventBus->dispatch($receipt->newEvents());
    }
}