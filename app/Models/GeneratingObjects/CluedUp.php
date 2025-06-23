<?php

namespace App\Models\GeneratingObjects;

use App\Models\GeneratingObjects\Employee;

class CluedUp extends Employee
{
    public function fire(): string
    {
        return "{$this->name}: I'll call my union rep\n";
    }
}
