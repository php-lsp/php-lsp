<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
final class DocumentSymbolClientCapabilitiesSymbolKind
{
    public function __construct(
        /**
         * The symbol kind values the client supports. When this property exists
         * the client also guarantees that it will handle values outside its set
         * gracefully and falls back to a default value when unknown.
         *
         * If this property is not present the client only supports the symbol
         * kinds from `File` to `Array` as defined in the initial version of the
         * protocol.
         *
         * @var list<SymbolKind>|null
         */
        public readonly ?array $valueSet = null,
    ) {}
}
