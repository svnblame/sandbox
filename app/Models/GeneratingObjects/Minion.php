<?php

namespace App\Models\GeneratingObjects;

class Minion extends Employee
{
    public function fire(): string
    {
        return "{$this->name}: I'll clear my desk";
    }
}
