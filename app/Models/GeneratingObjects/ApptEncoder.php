<?php

namespace App\Models\GeneratingObjects;

abstract class ApptEncoder implements Encoder
{
    abstract public function encode(): string;
}
