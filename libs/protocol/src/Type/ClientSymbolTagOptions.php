<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.18.0
 */
final class ClientSymbolTagOptions
{
    public function __construct(
        /**
         * The tags supported by the client.
         *
         * @var list<SymbolTag>
         */
        public readonly array $valueSet = [],
    ) {}
}
