<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 * @since 3.16.0
 */
final class SemanticTokensDelta
{
    /**
     * @param list<SemanticTokensEdit> $edits
     */
    final public function __construct(
        public readonly string $resultId,
        public readonly array $edits,
    ) {}
}
