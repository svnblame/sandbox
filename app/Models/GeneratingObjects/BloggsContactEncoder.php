<?php

namespace App\Models\GeneratingObjects;

class BloggsContactEncoder extends ApptEncoder implements Encoder
{
    public function encode(): string
    {
        return "Appointment data encoded in BloggsContact format\n";
    }
}
