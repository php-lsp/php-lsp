<?php

declare(strict_types=1);

namespace Lsp\Router\Handler;

interface HandlerInterface extends \Stringable
{
    /**
     * @return non-empty-string
     */
    public function __toString(): string;
}
