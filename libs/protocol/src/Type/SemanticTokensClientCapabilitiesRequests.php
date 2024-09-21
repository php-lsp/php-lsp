<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
final class SemanticTokensClientCapabilitiesRequests
{
    public function __construct(
        /**
         * The client will send the `textDocument/semanticTokens/range` request
         * if the server provides a corresponding handler.
         *
         * @var bool|object{}|null
         */
        public readonly bool|object|null $range = null,
        /**
         * The client will send the `textDocument/semanticTokens/full` request
         * if the server provides a corresponding handler.
         *
         * @var bool|object{delta: bool}|null
         */
        public readonly bool|object|null $full = null,
    ) {}
}
