<?php

namespace App\AdvancedFeatures;

use NumberFormatter;

abstract class ShopProductWriter
{
    protected array $products = [];

    public function addProduct(ShopProduct $shopProduct): void
    {
        $this->products[] = $shopProduct;
    }

    public function summaryLine(ShopProduct $product): void
    {
        $formatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
        $str = $product->title . ": "
            . $product->producer
            . " (" . $formatter->formatCurrency($product->price, "USD") . ")"
            . PHP_EOL;

        print $str;
    }

    abstract public function write(): void;
}
