<?php

declare(strict_types=1);

namespace Lsp\Router\Builder;

use Lsp\Contracts\Router\RouterInterface;

interface BuilderInterface extends CollectorInterface
{
    /**
     * Build router instance.
     */
    public function build(): RouterInterface;
}
