<?php

namespace App\Models\AdvancedFeatures;

class Document extends DomainObject
{
    public static function getGroup(): string
    {
        return 'Document';
    }
}
