<?php

namespace App\Models\GeneratingObjects;

class AppConfig
{
    private static AppConfig $instance;
    private CommsManager $commsManager;

    private function __construct()
    {
        $this->commsManager = match (Settings::COMMSTYPE) {
            'Mega' => new MegaCommsManager(),
            default => new BloggsCommsManager()
        };
    }

    public static function getInstance(): AppConfig
    {
        self::$instance ??= new self();
        return self::$instance;
    }

    public function getCommsManager(): CommsManager
    {
        return $this->commsManager;
    }
}
