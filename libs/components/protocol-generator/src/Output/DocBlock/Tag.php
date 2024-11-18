<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Output\DocBlock;

class Tag
{
    /**
     * @param non-empty-string $name
     */
    public function __construct(
        public readonly string $name,
        public readonly string $description = '',
    ) {}
}
