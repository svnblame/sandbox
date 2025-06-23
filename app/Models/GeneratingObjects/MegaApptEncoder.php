<?php

namespace App\Models\GeneratingObjects;

use App\Models\GeneratingObjects\ApptEncoder;

class MegaApptEncoder extends ApptEncoder
{
    public function encode(): string
    {
        return "Appointment data encoded in MegaCal format\n";
    }
}
