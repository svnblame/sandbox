<?php

namespace App\AdvancedFeatures;

class TextProductWriter extends ShopProductWriter
{
    public function write(): void
    {
        $str = "PRODUCTS:" . PHP_EOL;
        foreach ($this->products as $product) {
            $str .= $product->summaryLine() . PHP_EOL;
        }

        print $str . PHP_EOL;
    }
}