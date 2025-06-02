<?php

namespace App\Models\AdvancedFeatures;

enum ProductCategory: int
{
    case household = 1;
    case clothing  = 2;
    case reading   = 3;
    case audio     = 4;
    case grocery   = 5;

    public function isLeisure(): bool
    {
        return match($this) {
            self::reading, self::audio => true,
            default => false
        };
    }

    public static function getRandomCategory(): ProductCategory
    {
        return self::from(rand(1, 5));
    }
}
