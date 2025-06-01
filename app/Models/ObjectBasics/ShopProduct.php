<?php

namespace App\Models\ObjectBasics;

class ShopProduct {
    private int|float $discount = 0;
    public readonly string $producer;

    public function __construct(
        public readonly string $title = "default product",
        public readonly string $producerFirstName = "first name",
        public readonly string $producerMainName = "main name",
        public int|float $price = 0
    ) {
        $this->producer = $this->producerFirstName . " "
            . $this->producerMainName;
    }

    public function setDiscount(int | float $num): void
    {
        $this->discount = $num;
    }

    public function getDiscount(): int | float
    {
        return $this->discount;
    }

    public function getPrice(): int | float
    {
        return ($this->price - $this->discount);
    }

    public function summaryLine(): string
    {
        $base = "{$this->title} ( {$this->producerMainName}, ";
        $base .= "{$this->producerFirstName} )";

        return $base;
    }
}
