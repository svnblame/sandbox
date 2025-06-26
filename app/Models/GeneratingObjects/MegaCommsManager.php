<?php

namespace App\Models\GeneratingObjects;

use App\Models\GeneratingObjects\CommsManager;
use Exception;

class MegaCommsManager extends CommsManager
{
    public function getHeaderText(): string
    {
        return "MegaCal header\n";
    }

    /**
     * @throws Exception
     */
    public function make(ProdType $type): Encoder
    {
        return match ($type) {
            ProdType::appt => new MegaApptEncoder(),
            ProdType::contact => new MegaContactEncoder(),
            ProdType::ttd => new MegaTtdEncoder()
        };
    }

    public function getFooterText(): string
    {
        return "MegaCal footer\n";
    }
}
