<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\IR\Node;

use TypeLang\Parser\Node\Stmt\TypeStatement;

final class IRPropertyStatement extends IRStatement
{
    /**
     * @param non-empty-string $name
     */
    public function __construct(
        string $name,
        public readonly TypeStatement $type,
    ) {
        parent::__construct($name);
    }

    public function getSubNodeNames(): array
    {
        return ['type'];
    }
}
