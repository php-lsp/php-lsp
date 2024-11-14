<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Client Capabilities for a {@link DocumentSymbolRequest}.
 *
 * @generated 2024-11-14
 */
final class DocumentSymbolClientCapabilities
{
    public function __construct(
        /**
         * Whether document symbol supports dynamic registration.
         */
        public readonly ?bool $dynamicRegistration = null,
        /**
         * Specific capabilities for the `SymbolKind` in the
         * `textDocument/documentSymbol` request.
         */
        public readonly ?ClientSymbolKindOptions $symbolKind = null,
        /**
         * The client supports hierarchical document symbols.
         */
        public readonly ?bool $hierarchicalDocumentSymbolSupport = null,
        /**
         * The client supports tags on `SymbolInformation`. Tags are supported
         * on `DocumentSymbol` if `hierarchicalDocumentSymbolSupport` is set to
         * true.
         * Clients supporting tags have to handle unknown tags gracefully.
         *
         * @since 3.16.0
         */
        public readonly ?ClientSymbolTagOptions $tagSupport = null,
        /**
         * The client supports an additional label presented in the UI when
         * registering a document symbol provider.
         *
         * @since 3.16.0
         */
        public readonly ?bool $labelSupport = null,
    ) {}
}
