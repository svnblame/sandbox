<?php

namespace App\Models\AdvancedFeatures;

class TextProductWriter extends ShopProductWriter
{
    public function write(): string
    {
        $str = 'PRODUCTS:' . PHP_EOL;
        foreach ($this->products as $product) {
            $str .= $product->summaryLine() . PHP_EOL;
        }

        return $str;
    }
}
