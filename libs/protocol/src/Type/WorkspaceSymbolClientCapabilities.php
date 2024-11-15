<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Client capabilities for a {@link WorkspaceSymbolRequest}.
 *
 * @generated 2024-11-15
 */
final class WorkspaceSymbolClientCapabilities
{
    public function __construct(
        /**
         * Symbol request supports dynamic registration.
         */
        public readonly ?bool $dynamicRegistration = null,
        /**
         * Specific capabilities for the `SymbolKind` in the `workspace/symbol`
         * request.
         */
        public readonly ?ClientSymbolKindOptions $symbolKind = null,
        /**
         * The client supports tags on `SymbolInformation`.
         * Clients supporting tags have to handle unknown tags gracefully.
         *
         * @since 3.16.0
         */
        public readonly ?ClientSymbolTagOptions $tagSupport = null,
        /**
         * The client support partial workspace symbols. The client will send
         * the request `workspaceSymbol/resolve` to the server to resolve
         * additional properties.
         *
         * @since 3.17.0
         */
        public readonly ?ClientSymbolResolveOptions $resolveSupport = null,
    ) {}
}
