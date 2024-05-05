<?php

namespace Lsp\Protocol\Type;

/**
 * Client Capabilities for a {@link DocumentSymbolRequest}.
 *
 * @generated
 */
final class DocumentSymbolClientCapabilities
{
    /**
     * @generated
     */
    final public function __construct(
        public readonly bool $dynamicRegistration,
        public readonly object $symbolKind,
        public readonly bool $hierarchicalDocumentSymbolSupport,
        public readonly object $tagSupport,
        public readonly bool $labelSupport,
    ) {}
}
