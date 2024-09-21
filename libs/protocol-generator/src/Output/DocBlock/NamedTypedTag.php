<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Output\DocBlock;

use TypeLang\Parser\Node\Stmt\TypeStatement;

class NamedTypedTag extends TypedTag
{
    /**
     * @param non-empty-string $name
     */
    public function __construct(
        string $name,
        TypeStatement $type,
        public string $variable,
        string $description = '',
    ) {
        parent::__construct($name, $type, $description);
    }
}
