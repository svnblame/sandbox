<?php

namespace App\ObjectBasics;

class ShopProduct {
    public function __construct(
        public string $title = "default product",
        public string $producerFirstName = "first name",
        public string $producerMainName = "main name",
        public float $price = 0
    ) {}

    public function getProducer(): string
    {
        return $this->producerFirstName . " "
            . $this->producerMainName;
    }
}
