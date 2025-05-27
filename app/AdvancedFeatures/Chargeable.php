<?php

namespace App\AdvancedFeatures;

interface Chargeable
{
    public function getPrice(): float;
}
