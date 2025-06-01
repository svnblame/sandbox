<?php

namespace App\Models\ObjectBasics;

use NumberFormatter;

class ShopProductWriter {
    /**
     * Return a summary for a ShopProduct object
     *
     * @param ShopProduct $product
     * @return string
     */
    public function summaryLine(ShopProduct $product): string
    {
        $formatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);

        return $product->title . ": "
            . $product->producer
            . " (" . $formatter->formatCurrency($product->price, "USD") . ")";
    }
}
