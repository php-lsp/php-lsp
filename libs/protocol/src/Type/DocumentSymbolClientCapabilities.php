<?php

namespace Lsp\Protocol\Type;

/**
 * Client Capabilities for a {@link DocumentSymbolRequest}.
 *
 * @generated
 */
final class DocumentSymbolClientCapabilities
{
    final public function __construct(
        public readonly bool $dynamicRegistration,
        public readonly DocumentSymbolClientCapabilitiesSymbolKind $symbolKind,
        public readonly bool $hierarchicalDocumentSymbolSupport,
        public readonly DocumentSymbolClientCapabilitiesTagSupport $tagSupport,
        public readonly bool $labelSupport,
    ) {}
}
