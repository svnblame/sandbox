<?php

namespace App\Models\GeneratingObjects;

class BloggsTtdEncoder extends ApptEncoder implements Encoder
{
    public function encode(): string
    {
        return "Appointment data encoded in BloggsTtd format\n";
    }
}
