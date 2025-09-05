<?php

namespace App\Models\GeneratingObjects\DependencyInjection;

use ReflectionClass;
use ReflectionException;

class DIContainer
{
    private array $components = [];

    public function __construct(?string $conf = null)
    {
       if (! is_null($conf)) {
           $this->configure($conf);
       }
    }

    private function configure(string $conf): void
    {
        $data = simplexml_load_file($conf);

        foreach ($data->class as $class) {
            $args = [];
            $name = (string)$class['name'];
            $resolvedName = $name;

            foreach ($class->arg as $arg) {
                $argClass = (string)$arg['inst'];
                $args[(int)$arg['num']] = $argClass;
            }

            if (isset($class->instance)) {
                if (isset($class->instance[0]['inst'])) {
                    $resolvedName = (string)$class->instance[0]['inst'];
                }
            }

            ksort($args);

            $this->components[$name] = function () use ($resolvedName, $args) {
                $expandedArgs = [];

                foreach ($args as $arg) {
                    $expandedArgs[] = $this->get($arg);
                }
                $rClass = new ReflectionClass($resolvedName);
                return $rClass->newInstance($expandedArgs);
            };
        }
    }

    public function add(string $name, object $item): void
    {
        $this->customGen($name, fn ($container) => $item);
    }

    public function customGen(string $name, callable $func): void
    {
        $container = $this;

        $this->components[$name] = function () use ($container, $func): object {
            return $func($container);
        };
    }

    public function has(string $class): bool
    {
        if (isset($this->components[$class])) {
            return true;
        }

        if (class_exists($class)) {
            return true;
        }

        return false;
    }

    /**
     * @throws ReflectionException
     * @throws \Exception
     */
    public function get(string $class): object
    {
        // create $inst -- our object instance
        // and a list of \ReflectionMethod objects
       if (isset($this->components[$class])) {
           // instance already added by some means
           $inst = $this->components[$class];
           $rClass = new ReflectionClass($inst::class);
       } else {
           $rClass = new ReflectionClass($class);
           $inst = $this->getObjectFromAttribute($rClass);
           // do something with a null $inst...
           if (is_null($inst)) {
               $inst = $this->getObjectFromAutowire($rClass);
           }
       }

       $this->injectMethods($inst, $rClass->getMethods());
       $this->add(get_class($inst), $inst);

       return $inst;
    }

    private function injectMethods(object $inst, array $methods): void
    {
        foreach ($methods as $method) {
            foreach ($method->getAttributes(Inject::class) as $attribute) {
                $args[] = [];
                foreach ($attribute->getArguments() as $argString) {
                    $args[] = $this->get($argString);
                }

                $method->invokeArgs($inst, $args);
            }
        }
    }

    /**
     * @throws ReflectionException
     */
    private function getObjectFromAttribute(ReflectionClass $rClass): ?object
    {
        $rConstructor = $rClass->getConstructor();
        $methods = $rClass->getMethods();
        if (is_null($rConstructor)) {
            return null;
        }
        $attributes = $rClass->getAttributes(InjectConstructor::class);
        if (! count($attributes)) {
            return null;
        }
        $injectConstructor = $attributes[0];
        $constructorArgs = [];
        foreach ($injectConstructor->getArguments() as $arg) {
            $constructorArgs[] = $arg->get($arg);
        }

        return $rClass->newInstanceArgs($constructorArgs);
    }

    /**
     * @throws \Exception
     */
    private function getObjectFromAutowire(ReflectionClass $rClass): object
    {
        if (! $rClass->isInstantiable()) {
            throw new \Exception("{$rClass->getName()} can not be instantiated");
        }
        $rConstructor = $rClass->getConstructor();
        if (is_null($rConstructor)) {
            return $rClass->newInstance();
        }
        $constructorArgs = [];
        foreach ($rConstructor->getParameters() as $param) {
            $name = (
                $param->getType() instanceof \ReflectionNamedType &&
                ! $param->getType()->isBuiltin()
            ) ? $param->getType()->getName() : null;

            if (is_null($name)) {
                throw new \Exception("Unable to autowire {$rClass->getName()}");
            }

            $constructorArgs[] = $this->get($name);
        }

        return $rClass->newInstanceArgs($constructorArgs);
    }
}
