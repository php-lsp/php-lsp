<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-11-14
 */
final class DocumentSymbolClientCapabilitiesTagSupport
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
