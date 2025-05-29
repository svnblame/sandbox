<?php

namespace App\AdvancedFeatures;

trait IdentityTrait
{
    public function generateId(): string
    {
        return uniqid();
    }
}
