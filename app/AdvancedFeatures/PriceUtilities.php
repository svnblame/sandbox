<?php

namespace App\AdvancedFeatures;

trait PriceUtilities
{
    private int $taxRate = 20;

    public function calculateTax(float $price): float
    {
        return (($this->taxRate / 100) * $price);
    }
}
