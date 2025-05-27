<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\AdvancedFeatures\StaticExample;
use App\AdvancedFeatures\ShopProduct;
use App\AdvancedFeatures\ProductCategory;
use App\AdvancedFeatures\ShopProduct2;
use App\AdvancedFeatures\TextProductWriter;
use App\AdvancedFeatures\XmlProductWriter;
use App\AdvancedFeatures\UtilityService;

StaticExample::sayHello();
print PHP_EOL;

$connection = require_once("connection.php");

$book = ShopProduct::getInstance(1, $connection);

print_r($book);

$record = ShopProduct::getInstance(2, $connection);

print_r($record) . PHP_EOL;

print ShopProduct::AVAILABLE . PHP_EOL;

$prodType = ProductCategory::reading;

print_r($prodType) . PHP_EOL;

$product2 = new ShopProduct2(ProductCategory::audio);

if ($product2->getCategory() === ProductCategory::audio) {
    print "it is an audio Product" . PHP_EOL;
} elseif ($product2->getCategory() == "audio") {
    print "it is an audio Product" . PHP_EOL;
} else {
    print "it is NOT an audio Product" . PHP_EOL;
}

$product2Type = ProductCategory::tryFrom(4);
print $product2Type->value . PHP_EOL;

print ProductCategory::audio->isLeisure() . PHP_EOL;

$product3 = new ShopProduct2(ProductCategory::clothing);
print $product3->getCategory()->isLeisure() . PHP_EOL;

print_r(ProductCategory::getRandomCategory()) . PHP_EOL;

$product4 = ShopProduct::getInstance(1, $connection);
$xmlWriter = new XmlProductWriter();
$xmlWriter->addproduct($product4);

$xmlWriter->write();

$textWriter = new TextProductWriter();
$textWriter->addproduct($product4);
$textWriter->write();

print PHP_EOL;

$p = new ShopProduct();
print $p->calculateTax(100) . PHP_EOL;

$u = new UtilityService();
print $u->calculateTax(100) . PHP_EOL;