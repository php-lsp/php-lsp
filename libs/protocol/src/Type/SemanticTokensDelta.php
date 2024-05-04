<?php

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.16.0
 */
final class SemanticTokensDelta
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.16.0
     * @param list<SemanticTokensEdit> $edits
     */
    final public function __construct(
        public readonly string $resultId,
        public readonly array $edits,
    ) {}
}
