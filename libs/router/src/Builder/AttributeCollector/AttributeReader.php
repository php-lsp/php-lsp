<?php

declare(strict_types=1);

namespace Lsp\Router\Builder\AttributeCollector;

use Lsp\Router\Attribute\Route;

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
            $action = null;

            foreach ($method->getAttributes(Route::class) as $attribute) {
                /** @var Route $instance */
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
        $action = null;

        foreach ($class->getAttributes(Route::class) as $attribute) {
            /** @var Route $instance */
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
                $class->name,
            ));
        }

        $method = $class->getMethod('__invoke');

        if (!self::isInstanceCallExpected($method)) {
            throw new \InvalidArgumentException(\sprintf(
                'The %s::__invoke() method cannot be static',
                $class->name,
            ));
        }

        return $this->getValidReflectionMethod($class, $method);
    }

    /**
     * @param \ReflectionClass<object> $class
     */
    private function getValidReflectionMethod(\ReflectionClass $class, \ReflectionMethod $method): \ReflectionMethod
    {
        if (self::isNonImplemented($method)) {
            throw new \InvalidArgumentException(\sprintf(
                'The %s::%s() method cannot be abstract',
                $class->name,
                $method->name,
            ));
        }

        if (self::isNonAccessible($method)) {
            throw new \InvalidArgumentException(\sprintf(
                'The %s::%s() method must be public',
                $class->name,
                $method->name,
            ));
        }

        if (self::isMagicNonFunctorMethod($method)) {
            throw new \InvalidArgumentException(\sprintf(
                'The %s::%s() looks like a builtin "magic" method, '
                    . 'please use a different name for route action',
                $class->name,
                $method->name,
            ));
        }

        return $method;
    }

    private static function isInstanceCallExpected(\ReflectionFunctionAbstract $fn): bool
    {
        return $fn instanceof \ReflectionMethod
            && !$fn->isStatic();
    }

    private static function isNonImplemented(\ReflectionFunctionAbstract $fn): bool
    {
        return $fn instanceof \ReflectionMethod
            && $fn->isAbstract();
    }

    private static function isNonAccessible(\ReflectionFunctionAbstract $fn): bool
    {
        return $fn instanceof \ReflectionMethod
            && !$fn->isPublic();
    }

    private static function isMagicNonFunctorMethod(\ReflectionFunctionAbstract $fn): bool
    {
        return \str_starts_with($fn->name, '__')
            && \strtolower($fn->name) !== '__invoke';
    }
}
