<?php

namespace App\Models\AdvancedFeatures;

interface IdentityObject
{
    public function generateId(): string;
}
