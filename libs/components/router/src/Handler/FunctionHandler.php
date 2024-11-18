<?php

declare(strict_types=1);

namespace Lsp\Router\Handler;

final class FunctionHandler
{
    /**
     * @param callable-string $function
     */
    public function __construct(
        public readonly string $function,
    ) {}

    public function __toString(): string
    {
        return \vsprintf('%s()', [
            $this->function,
        ]);
    }
}
