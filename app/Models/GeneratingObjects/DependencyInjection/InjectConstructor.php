<?php

namespace App\Models\GeneratingObjects\DependencyInjection;

use \Attribute;

#[Attribute]
class InjectConstructor
{
    public array $className;

    public function __construct(string ...$className)
    {
        $this->className = $className;
    }
}
