<?php

namespace App\Models\GeneratingObjects;

class Container
{
    private array $components = [];

    public function __construct(string $conf)
    {
        $this->configure($conf);
    }

    private function configure(string $conf): void
    {
        $data = simplexml_load_file($conf);

        foreach ($data->class as $class) {
            $name = (string) $class['name'];
            $resolvedName = $name;

            if (isset($class->instance)) {
                if (isset($class->instance[0]['inst'])) {
                    $resolvedName = (string) $class->instance[0]['inst'];
                }
            }

            $this->components[$name] = function () use ($resolvedName) {
                $rClass = new \ReflectionClass($resolvedName);
                return $rClass->newInstance();
            };
        }
    }

    public function get(string $class): object
    {
        if (isset($this->components[$class])) {
            $inst = $this->components[$class]();
        } else {
            $rClass = new \ReflectionClass($class);
            $inst = $rClass->newInstance();
        }

        return $inst;
    }
}
