<?php

namespace App;

trait IdentityTrait
{
    public function generateId(): string
    {
        return uniqid();
    }
}
