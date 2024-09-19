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
        public readonly bool|null $dynamicRegistration = null,
        public readonly DocumentSymbolClientCapabilitiesSymbolKind|null $symbolKind = null,
        public readonly bool|null $hierarchicalDocumentSymbolSupport = null,
        public readonly DocumentSymbolClientCapabilitiesTagSupport|null $tagSupport = null,
        public readonly bool|null $labelSupport = null,
    ) {}
}