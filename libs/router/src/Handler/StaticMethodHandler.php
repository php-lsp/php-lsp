<?php

declare(strict_types=1);

namespace Lsp\Router\Handler;

class StaticMethodHandler extends ClassMethodHandler
{
    public function __toString(): string
    {
        return \sprintf('%s::%s()', $this->class, $this->method);
    }
}
