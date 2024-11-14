<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-11-14
 */
final class SemanticTokensClientCapabilitiesRequests
{
    public function __construct(
        /**
         * The client will send the `textDocument/semanticTokens/range` request
         * if the server provides a corresponding handler.
         */
        public readonly bool|SemanticTokensClientCapabilitiesRequestsRange|null $range = null,
        /**
         * The client will send the `textDocument/semanticTokens/full` request
         * if the server provides a corresponding handler.
         */
        public readonly bool|SemanticTokensClientCapabilitiesRequestsFull|null $full = null,
    ) {}
}
