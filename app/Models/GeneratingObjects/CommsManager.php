<?php

namespace App\Models\GeneratingObjects;

class CommsManager
{
    public function __construct(private EncoderType $mode) {}

    public function getApptEncoder(): ApptEncoder
    {
        return match ($this->mode) {
            EncoderType::bloggs => new BloggsApptEncoder(),
            EncoderType::mega   => new MegaApptEncoder()
        };
    }
}
