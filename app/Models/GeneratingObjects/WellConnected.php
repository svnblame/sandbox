<?php

namespace App\Models\GeneratingObjects;

class WellConnected extends Employee
{
    public function fire(): string
    {
        return "{$this->name}: I'll call my dad\n";
    }
}
