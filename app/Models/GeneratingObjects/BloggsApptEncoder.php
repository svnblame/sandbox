<?php

namespace App\Models\GeneratingObjects;

class BloggsApptEncoder extends ApptEncoder implements Encoder
{
    public function encode(): string
    {
        return "Appointment data encoded in BloggsCal format\n";
    }
}
