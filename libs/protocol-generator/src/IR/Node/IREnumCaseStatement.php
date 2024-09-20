<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\IR\Node;

final class IREnumCaseStatement extends IRStatement
{
    /**
     * @param non-empty-string $name
     */
    public function __construct(
        string $name,
        public readonly mixed $value,
    ) {
        parent::__construct($name);
    }
}
