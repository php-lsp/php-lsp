<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
final class SemanticTokensOptionsFull
{
    public function __construct(
        /**
         * The server supports deltas for full documents.
         */
        public readonly ?bool $delta = null,
    ) {}
}
