<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\ObjectBasics\ShopProduct;
use App\ObjectBasics\AddressManager;
use App\ObjectBasics\ShopProductWriter;
use App\ObjectBasics\Wrong;

$product = new ShopProduct(
    title: "My Antonia",
    producerFirstName: "Willa",
    producerMainName: "Cather",
    price: 5.99
);

print "author: {$product->producer}" . PHP_EOL . PHP_EOL;

$settings = simplexml_load_file(__DIR__ . '/config/settings.xml');
$manager = new AddressManager();
$resolve = $settings->resolvedomains == 'true';
$manager->outputAddresses($resolve);

print PHP_EOL;

$product2 = new ShopProduct(
    title: "Exile on Coldharbour Lane",
    producerFirstName: "The",
    producerMainName: "Alabama 3",
    price: 10.99);
$writer = new ShopProductWriter();
$writer->summaryLine($product2);
