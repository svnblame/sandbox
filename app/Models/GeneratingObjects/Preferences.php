<?php

namespace App\Models\GeneratingObjects;

class Preferences
{
    private array $props = [];
    private static self $instance;

    private function __construct() {}

    public static function getInstance(): Preferences
    {
        if (empty(static::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function setProperty(string $key, string $val): void
    {
        $this->props[$key] = $val;
    }

    public function getProperty(string $key): ?string
    {
        return $this->props[$key] ?? null;
    }
}
