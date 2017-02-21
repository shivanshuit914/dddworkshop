<?php

require_once('Price.php');
require_once('Product.php');
require_once('Receipt.php');
require_once('SKU.php');
require_once('IssuedDate.php');
require_once('Receipt.php');
require_once('RollNumber.php');
require_once('ReceiptRefunded.php');
require_once('ReceiptIssuerInterface.php');
require_once('ReceiptRefunderInterface.php');
require_once('Services/ReceiptIssuer.php');
require_once('Services/ReceiptRefunder.php');
require_once('ReceiptsRepositoryInterface.php');
require_once('Infrastructure/InMemoryReceiptsRepository.php');
require_once('Infrastructure/EventBusInterface.php');
require_once('Infrastructure/EventBus.php');



foreach (glob("ReadModel/*.php") as $filename)
{
    require_once $filename;
}

foreach (glob("ReadModel/Infrastructure/*.php") as $filename)
{
    require_once $filename;
}

foreach (glob("Infrastructure/*.php") as $filename)
{
    require_once $filename;
}

$sku = SKU::fromString('hsdfashf');
$price = Price::withAmount(12);
$price2 = Price::withAmount(230);
$product = [
    ['sku' => 'asss', 'price' => 12],
    ['sku' => 'abc', 'price' => 230],
];


$receiptRepository = new InMemoryReceiptsRepositoryInterfaceRepository();
$receiptIssuer = new ReceiptIssuer($receiptRepository);
$receiptIssuer->issue('1231323s', new DateTime("2016-11-21"), $product);
$eventBus = new EventBus();
$readRepository = new InMemoryRefundRepository();
$eventBus->subscribe(new RefundedListener($readRepository));
$reciptRefunder = new ReceiptRefunder($receiptRepository, $eventBus);
$reciptRefunder->refund('1231323s');




$receiptIssuer = new ReceiptIssuer($receiptRepository);
$receiptIssuer->issue('1231323s33', new DateTime("2016-11-21"), $product);
$reciptRefunder = new ReceiptRefunder($receiptRepository, $eventBus);
$reciptRefunder->refund('1231323s33');



$total = $readRepository->findTotalRefunded();
$view = new ReceiptRefundView($total);
echo $view->count;
