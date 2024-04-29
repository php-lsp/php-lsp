<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node;

final class MetaData
{
    /**
     * @param string $version The protocol version.
     */
    public function __construct(
        public readonly string $version,
    ) {}
}
