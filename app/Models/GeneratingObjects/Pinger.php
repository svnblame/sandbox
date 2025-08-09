<?php

namespace App\Models\GeneratingObjects;

class Pinger
{
    public function __construct(private readonly PingReporter $reporter) {}

    public function execute(): string
    {
        return $this->reporter->report("All is well!");
    }
}
