<?php

namespace App\AdvancedFeatures;

class StaticExample
{
    private static int $aNum = 0;

    public static function sayHello(): void
    {
        self::$aNum++;
        print "hello (". self::$aNum .")" . PHP_EOL;
    }
}