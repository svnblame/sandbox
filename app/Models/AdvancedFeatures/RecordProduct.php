<?php

namespace App\Models\AdvancedFeatures;

class RecordProduct extends ShopProduct
{
    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        int|float $price,
        public readonly int $playLength
    ) {
        parent::__construct(ProductCategory::audio, $title, $firstName, $mainName, $price, $playLength);
    }

    public function summaryLine(): string
    {
        $base = "{$this->title} ( {$this->producerMainName}, ";
        $base .= "{$this->producerFirstName} )";
        $base .= ": {$this->playLength} minutes";

        return $base;
    }
}
