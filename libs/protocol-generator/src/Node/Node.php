<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node;

use PhpParser\NodeAbstract;

abstract class Node extends NodeAbstract
{
    /**
     * @return non-empty-string
     */
    public function getType(): string
    {
        $offset = \strrpos(static::class, '\\');

        /** @var non-empty-string */
        return \substr(static::class, $offset);
    }

    /**
     * @return list<non-empty-string>
     */
    public function getSubNodeNames(): array
    {
        return [];
    }
}
