<?php

declare(strict_types=1);

namespace App\AdvancedFeatures;

class RecordProduct extends ShopProduct
{
    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        int|float $price,
        public readonly int $playLength
    ) {
        parent::__construct($title, $firstName, $mainName);
    }

    public function summaryLine(): string
    {
        $base = "{$this->title} ( {$this->producerMainName}, ";
        $base .= "{$this->producerFirstName} )";
        $base .= ": playing time - {$this->playLength}";
        return $base;
    }
}