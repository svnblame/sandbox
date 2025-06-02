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
        parent::__construct($title, $firstName, $mainName, $price);
    }

    public function summaryLine(): string
    {
        $base = "{$this->title} ( {$this->producerMainName}, ";
        $base .= "{$this->producerFirstName} )";
        $base .= ": playing time - {$this->playLength}";

        return $base;
    }
}
