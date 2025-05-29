<?php

namespace App\AdvancedFeatures;

abstract class DomainObject
{
    private string $group;

    public function __construct()
    {
        $this->group = static::getGroup();
    }
    public static function create(): DomainObject
    {
        return new static();
    }

    public static function getGroup(): string
    {
        return 'default';
    }
}
