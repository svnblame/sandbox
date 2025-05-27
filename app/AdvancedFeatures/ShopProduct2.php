<?php

namespace App\AdvancedFeatures;

class ShopProduct2
{
    public function __construct(private ProductCategory $category) {}

    public function getCategory(): ProductCategory
    {
        return $this->category;
    }
}
