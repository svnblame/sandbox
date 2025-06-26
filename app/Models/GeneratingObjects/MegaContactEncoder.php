<?php

namespace App\Models\GeneratingObjects;

use App\Models\GeneratingObjects\ApptEncoder;

class MegaContactEncoder extends ApptEncoder
{
    public function encode(): string
    {
        return "Appointment data encoded in MegaContact format\n";
    }
}
