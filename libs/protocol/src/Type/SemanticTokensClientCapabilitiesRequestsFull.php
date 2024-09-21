<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
final class SemanticTokensClientCapabilitiesRequestsFull
{
    public function __construct(
        /**
         * The client will send the `textDocument/semanticTokens/full/delta`
         * request if the server provides a corresponding handler.
         */
        public readonly ?bool $delta = null,
    ) {}
}
