<?php

declare(strict_types=1);

namespace Lsp\Router\Builder\AttributeCollector;

use Lsp\Router\Attribute\Route as RouteAttribute;

/**
 * @internal this is an internal library class, please do not use it in your code
 * @psalm-internal Lsp\Router\Builder
 */
final class AttributeReader
{
    /**
     * @param \ReflectionClass<object> $class
     *
     * @return iterable<non-empty-string, \ReflectionMethod>
     */
    public function getAllMethods(\ReflectionClass $class): iterable
    {
        yield from $this->getAllControllerMethods($class);
        yield from $this->getAllFunctorMethods($class);
    }

    /**
     * @param \ReflectionClass<object> $class
     *
     * @return iterable<non-empty-string, \ReflectionMethod>
     */
    public function getAllControllerMethods(\ReflectionClass $class): iterable
    {
        foreach ($class->getMethods() as $method) {
            $attributes = $class->getAttributes(RouteAttribute::class);
            $action = null;

            foreach ($attributes as $attribute) {
                /** @var RouteAttribute $instance */
                $instance = $attribute->newInstance();

                yield $instance->method => ($action ??= $this->getValidReflectionMethod(
                    class: $class,
                    method: $method,
                ));
            }
        }
    }

    /**
     * @param \ReflectionClass<object> $class
     *
     * @return iterable<non-empty-string, \ReflectionMethod>
     */
    public function getAllFunctorMethods(\ReflectionClass $class): iterable
    {
        $attributes = $class->getAttributes(RouteAttribute::class);
        $action = null;

        foreach ($attributes as $attribute) {
            /** @var RouteAttribute $instance */
            $instance = $attribute->newInstance();

            yield $instance->method => ($action ??= $this->getValidReflectionFunctorMethod($class));
        }
    }

    /**
     * @param \ReflectionClass<object> $class
     */
    private function getValidReflectionFunctorMethod(\ReflectionClass $class): \ReflectionMethod
    {
        if (!$class->hasMethod('__invoke')) {
            throw new \InvalidArgumentException(\sprintf(
                'To declare a controller %s as a functor, a method declaration __invoke() is required',
                $class->getName(),
            ));
        }

        $method = $class->getMethod('__invoke');

        if ($method->isStatic()) {
            throw new \InvalidArgumentException(\sprintf(
                'The %s::__invoke() method cannot be static',
                $class->getName(),
            ));
        }

        return $this->getValidReflectionMethod($class, $method);
    }

    /**
     * @param \ReflectionClass<object> $class
     */
    private function getValidReflectionMethod(\ReflectionClass $class, \ReflectionMethod $method): \ReflectionMethod
    {
        if ($method->isAbstract()) {
            throw new \InvalidArgumentException(\sprintf(
                'The %s::%s() method cannot be abstract',
                $class->getName(),
                $method->getName(),
            ));
        }

        if (!$method->isPublic()) {
            throw new \InvalidArgumentException(\sprintf(
                'The %s::%s() method must be public',
                $class->getName(),
                $method->getName(),
            ));
        }

        return $method;
    }
}