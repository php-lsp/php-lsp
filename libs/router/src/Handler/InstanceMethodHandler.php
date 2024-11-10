<?php

declare(strict_types=1);

namespace Lsp\Router\Handler;

final class InstanceMethodHandler
{
    /**
     * @param non-empty-string $method
     */
    public function __construct(
        public readonly object $object,
        public readonly string $method,
    ) {}

    public function __toString(): string
    {
        return \vsprintf('object(%s#%d)->%s()', [
            $this->object::class,
            \spl_object_id($this->object),
            $this->method,
        ]);
    }
}
