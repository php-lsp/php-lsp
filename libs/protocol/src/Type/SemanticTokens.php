<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 *
 * @since 3.16.0
 */
final class SemanticTokens
{
    /**
     * @param list<int<0, 2147483647>> $data
     */
    final public function __construct(
        public readonly string $resultId,
        public readonly array $data,
    ) {}
}
