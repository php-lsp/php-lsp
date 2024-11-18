<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\MetaModel\Node;

use PhpParser\NodeAbstract;

abstract class MetaNode extends NodeAbstract
{
    /**
     * @return non-empty-string
     */
    public function getType(): string
    {
        $offset = (int) \strrpos(static::class, '\\');

        /** @var non-empty-string */
        return \substr(static::class, $offset + 1);
    }

    /**
     * @return list<non-empty-string>
     */
    public function getSubNodeNames(): array
    {
        return [];
    }
}
