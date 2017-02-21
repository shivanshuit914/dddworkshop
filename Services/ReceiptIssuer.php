<?php

/**
 * Class ReceiptIssuer.
 *
 * @author        Shivanshu Patel <shivanshu.patel@worldfirst.com>
 * @copyright     2016 World First Ltd. All rights reserved.
 */
class ReceiptIssuer implements ReceiptIssuerInterface
{

    /**
     * @var ReceiptsRepositoryInterface
     */
    private $receiptsRepository;

    public function __construct(ReceiptsRepositoryInterface $receiptsRepository)
    {
        $this->receiptsRepository = $receiptsRepository;
    }

    /**
     * @param string $rollNumber
     * @param DateTimeInterface $issueDate
     * @param array $products
     */
    public function issue(string $rollNumber, DateTimeInterface $issueDate, array $products)
    {
        $receiptProducts = [];
        foreach ($products as $product) {
            $sku = SKU::fromString($product['sku']);
            $price = Price::withAmount($product['price']);
            $receiptProducts[] = Product::withSKUAndPrice($sku, $price);
        }
        $rollNumber = RollNumber::fromString($rollNumber);
        $issueDate = IssuedDate::withDate($issueDate);
        $receipt = Receipt::issueWith(
            $receiptProducts,
            $rollNumber,
            $issueDate
        );
        $this->receiptsRepository->save($receipt);
    }
}