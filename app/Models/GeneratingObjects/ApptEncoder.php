<?php

namespace App\Models\GeneratingObjects;

abstract class ApptEncoder
{
    abstract public function encode(): string;
}
