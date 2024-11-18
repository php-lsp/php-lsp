<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.16.0
 */
final class SemanticTokensDeltaPartialResult
{
    public function __construct(
        /**
         * @var list<SemanticTokensEdit>
         */
        public readonly array $edits = [],
    ) {}
}
