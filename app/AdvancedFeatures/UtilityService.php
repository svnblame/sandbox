<?php

namespace App\AdvancedFeatures;

class UtilityService extends Service
{
    use PriceUtilities {
        PriceUtilities::calculateTax as private;
    }

    public function __construct(private float $price) {}

    public function getTaxRate(): float
    {
        return 20;
    }

    public function getFinalPrice(): float
    {
        return ($this->price + $this->getTaxRate());
    }
}
