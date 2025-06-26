<?php

namespace App\Models\GeneratingObjects;

class MegaTtdEncoder extends ApptEncoder
{
    public function encode(): string
    {
        return "Appointment data encoded in MegaTtd format\n";
    }
}
