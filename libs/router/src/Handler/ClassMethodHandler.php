<?php

declare(strict_types=1);

namespace Lsp\Router\Handler;

class ClassMethodHandler implements HandlerInterface
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
        return \sprintf('service(%s)->%s()', $this->class, $this->method);
    }
}
