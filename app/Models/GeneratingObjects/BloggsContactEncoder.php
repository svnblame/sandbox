<?php

namespace App\Models\GeneratingObjects;

class BloggsContactEncoder extends ApptEncoder
{
    public function encode(): string
    {
        return "Appointment data encoded in BloggsContact format\n";
    }
}
