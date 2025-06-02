<?php

namespace App;

trait TaxTools
{
    public function calculateTax(float $price): float
    {
        return ($price * 20) / 100;
    }
}
