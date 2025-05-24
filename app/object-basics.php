<?php

require __DIR__ . '/../vendor/autoload.php';

use App\ObjectBasics\ShopProduct;
use App\ObjectBasics\AddressManager;

$product = new ShopProduct(
    title: "My Antonia",
    producerFirstName: "Willa",
    producerMainName: "Cather",
    price: 5.99
);

print "author: {$product->getProducer()}" . PHP_EOL;

$settings = simplexml_load_file(__DIR__ . '/settings.xml');
$manager = new AddressManager();
$manager->outputAddresses((string) $settings->resolvedomains);
