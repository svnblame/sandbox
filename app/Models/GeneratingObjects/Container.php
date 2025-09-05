<?php

namespace App\Models\GeneratingObjects;

use ReflectionClass;

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
            $args = [];
            $name = (string) $class['name'];
            $resolvedName = $name;

            foreach ($class->arg as $arg) {
                $argClass = (string) $arg['inst'];
                $args[(int)$arg['num']] = $argClass;
            }

            if (isset($class->instance)) {
                if (isset($class->instance[0]['inst'])) {
                    $resolvedName = (string) $class->instance[0]['inst'];
                }
            }

            ksort($args);

            $this->components[$name] = function () use ($resolvedName, $args) {
                $expandedArgs = [];

                foreach ($args as $arg) {
                    $expandedArgs[] = $this->get($arg);
                }

                $rClass = new ReflectionClass($resolvedName);
                return $rClass->newInstanceArgs($expandedArgs);;
            };
        }
    }

    /**
     * @throws \ReflectionException
     */
    public function get(string $class): object
    {
        if (isset($this->components[$class])) {
            $inst = $this->components[$class]();
        } else {
            $rClass = new ReflectionClass($class);
            $inst = $rClass->newInstance();
        }

        return $inst;
    }
}
