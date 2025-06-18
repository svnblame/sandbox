<?php

namespace App\Models\GeneratingObjects;

use App\Models\GeneratingObjects\ApptEncoder;

class BloggsApptEncoder extends ApptEncoder
{
    public function encode(): string
    {
        return "Appointment data encoded in BloggsCal format\n";
    }
}
