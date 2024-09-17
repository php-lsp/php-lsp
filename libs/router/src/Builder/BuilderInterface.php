<?php

declare(strict_types=1);

namespace Lsp\Router\Builder;

use Lsp\Router\RouterInterface;

interface BuilderInterface
{
    public function build(): RouterInterface;
}
