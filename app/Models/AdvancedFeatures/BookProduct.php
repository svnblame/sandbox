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
        parent::__construct(ProductCategory::reading, $title, $firstName, $mainName, $price, $numPages);
    }

    public function summaryLine(): string
    {
        $base = parent::summaryLine();
        $base .= ": {$this->numPages} pages";
        return $base;
    }

    public function price(): int|float
    {
        return $this->price;
    }
}
