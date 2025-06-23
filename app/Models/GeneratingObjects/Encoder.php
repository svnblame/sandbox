<?php

namespace App\Models\GeneratingObjects;

interface Encoder
{
    public function encode(): string;
}
