<?php

namespace App\Models\GeneratingObjects\DependencyInjection;

use Attribute;

#[Attribute]
class Inject
{
    public function __construct(public string $className) {}
}
