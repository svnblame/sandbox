<?php

namespace App\AdvancedFeatures;

interface IdentityObject
{
    public function generateId(): string;
}
