<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Semantic tokens options to support deltas for full documents.
 *
 * @since 3.18.0
 */
final class SemanticTokensFullDelta
{
    public function __construct(
        /**
         * The server supports deltas for full documents.
         */
        public readonly ?bool $delta = null,
    ) {}
}
