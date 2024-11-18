<?php

declare(strict_types=1);

namespace Lsp\Kernel\Attribute;

#[\Attribute(\Attribute::TARGET_CLASS)]
final class AsController
{
    public function __construct(
        public readonly bool $lazy = true,
    ) {}
}
