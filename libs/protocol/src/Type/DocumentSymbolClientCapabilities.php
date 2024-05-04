<?php

namespace Lsp\Protocol\Type;

/**
 * Client Capabilities for a {@link DocumentSymbolRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class DocumentSymbolClientCapabilities
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly bool $dynamicRegistration,
        public readonly object $symbolKind,
        public readonly bool $hierarchicalDocumentSymbolSupport,
        public readonly object $tagSupport,
        public readonly bool $labelSupport,
    ) {}
}
