<?php

namespace App\ObjectBasics;

use NumberFormatter;

class ShopProductWriter
{
    public function summaryLine(ShopProduct $product): void
    {
        $formatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
        $str = $product->title . ": "
            . $product->getProducer()
            . " (" . $formatter->formatCurrency($product->price, "USD") . ")"
            . PHP_EOL;

        print $str;
    }
}