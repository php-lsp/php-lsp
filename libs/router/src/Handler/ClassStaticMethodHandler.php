<?php

declare(strict_types=1);

namespace Lsp\Router\Handler;

final class ClassStaticMethodHandler
{
    /**
     * @param class-string $class
     * @param non-empty-string $method
     */
    public function __construct(
        public readonly string $class,
        public readonly string $method,
    ) {}

    public function __toString(): string
    {
        return \vsprintf('%s::%s()', [
            $this->class,
            $this->method,
        ]);
    }
}
