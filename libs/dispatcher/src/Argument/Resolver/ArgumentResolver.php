<?php

declare(strict_types=1);

namespace Lsp\Dispatcher\Argument\Resolver;

abstract class ArgumentResolver implements ArgumentResolverInterface
{
    protected function findTypeName(\ReflectionParameter $parameter): ?string
    {
        $type = $parameter->getType();

        if (!$type instanceof \ReflectionNamedType) {
            return null;
        }

        return $type->getName();
    }

    /**
     * @template T of mixed
     *
     * @param non-empty-string $type
     * @param \Closure(\ReflectionParameter):iterable<array-key, T> $then
     *
     * @return iterable<array-key, T>
     */
    protected function whenType(\ReflectionParameter $parameter, string $type, \Closure $then): iterable
    {
        $actual = $this->findTypeName($parameter);

        if ($actual === null) {
            return;
        }

        if (!\is_a($actual, $type, true)) {
            return;
        }

        yield from $then($parameter);
    }
}
