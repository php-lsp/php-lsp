<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Output\DocBlock;

use TypeLang\Parser\Node\Stmt\TypeStatement;

class TypedTag extends Tag
{
    /**
     * @param non-empty-string $name
     */
    public function __construct(
        string $name,
        public readonly TypeStatement $type,
        string $description = '',
    ) {
        parent::__construct($name, $description);
    }
}
