<?php

namespace App\Models\AdvancedFeatures;

interface Chargeable
{
    public function getPrice(): float;
}
