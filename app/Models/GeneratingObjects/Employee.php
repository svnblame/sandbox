<?php

namespace App\Models\GeneratingObjects;

abstract class Employee
{
    public function __construct(protected string $name) {}

    abstract public function fire(): string;
}
