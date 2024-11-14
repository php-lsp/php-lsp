<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.18.0
 *
 * @generated 2024-11-14
 */
final class ClientSemanticTokensRequestOptions
{
    public function __construct(
        /**
         * The client will send the `textDocument/semanticTokens/range` request
         * if the server provides a corresponding handler.
         */
        public readonly bool|ClientSemanticTokensRequestOptionsRange|null $range = null,
        /**
         * The client will send the `textDocument/semanticTokens/full` request
         * if the server provides a corresponding handler.
         */
        public readonly bool|ClientSemanticTokensRequestFullDelta|null $full = null,
    ) {}
}
