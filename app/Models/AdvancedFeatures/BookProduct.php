<?php

namespace App\Models\AdvancedFeatures;

class BookProduct extends ShopProduct
{
    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        int|float $price,
        public readonly int $numPages
    ) {
        parent::__construct($title, $firstName, $mainName, $price);
    }

    public function summaryLine(): string
    {
        $base = parent::summaryLine();
        $base .= ": page count - {$this->numPages}";
        return $base;
    }

    public function price(): int|float
    {
        return $this->price;
    }
}
