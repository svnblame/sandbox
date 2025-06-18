<?php

namespace App\Models\GeneratingObjects;

abstract class Employee
{
    private static array $types = [Minion::class, CluedUp::class, WellConnected::class];

    public function __construct(protected string $name) {}

    public static function recruit(string $name): Employee
    {
        $num = rand(1, count(self::$types)) - 1;
        $class = self::$types[$num];

        return new $class($name);
    }

    abstract public function fire(): string;
}
