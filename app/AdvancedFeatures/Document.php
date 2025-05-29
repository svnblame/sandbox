<?php

namespace App\AdvancedFeatures;

use App\AdvancedFeatures\DomainObject;

class Document extends DomainObject
{
    public static function getGroup(): string
    {
        return 'document';
    }
}
