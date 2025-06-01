<?php

namespace App\Models\AdvancedFeatures;

class StaticExample
{
    private static int $aNum = 0;

    public static function sayHello(): string
    {
        self::$aNum++;
        return 'Hello (' . self::$aNum . ')!';
    }
}
