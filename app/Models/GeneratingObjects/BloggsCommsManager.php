<?php

namespace App\Models\GeneratingObjects;

class BloggsCommsManager extends CommsManager
{
    public function getHeaderText(): string
    {
        return "BloggsCal header\n";
    }

    public function make(ProdType $type): Encoder
    {
        return match ($type) {
            ProdType::appt => new BloggsApptEncoder(),
            ProdType::contact => new BloggsContactEncoder(),
            ProdType::ttd => new BloggsTtdEncoder(),
        };
    }

    public function getFooterText(): string
    {
        return "BloggsCal footer\n";
    }
}
