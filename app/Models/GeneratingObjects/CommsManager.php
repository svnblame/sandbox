<?php

namespace App\Models\GeneratingObjects;

abstract class CommsManager
{
    abstract public function getHeaderText(): string;
    abstract public function make(ProdType $type): Encoder;
    abstract public function getFooterText(): string;
}
