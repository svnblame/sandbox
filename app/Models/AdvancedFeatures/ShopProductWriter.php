<?php

namespace App\Models\AdvancedFeatures;

use NumberFormatter;

abstract class ShopProductWriter
{
    protected array $products = [];

    public function addProduct(ShopProduct $shopProduct): void
    {
        $this->products[] = $shopProduct;
    }

    public function summaryLine(ShopProduct $product): string
    {
        $formater = new NumberFormatter('en_US', NumberFormatter::CURRENCY);

        return $product->title . ': '
            . $product->producer
            . ' (' . $formater->formatCurrency($product->price, 'USD') . ')';
    }

    abstract public function write(): string;
}
