<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\IR\Node;

use TypeLang\Parser\Node\Stmt\TypeStatement;

final class IREnumStatement extends IRClassLikeStatement
{
    /**
     * @var list<IREnumCaseStatement>
     */
    public array $cases = [];

    /**
     * @param non-empty-string $name
     */
    public function __construct(
        string $name,
        public readonly ?TypeStatement $type = null,
        public readonly bool $sealed = false,
    ) {
        parent::__construct($name);
    }

    public function getSubNodeNames(): array
    {
        return ['type', 'cases'];
    }
}
