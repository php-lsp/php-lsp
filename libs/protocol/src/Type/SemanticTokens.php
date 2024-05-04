<?php

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.16.0
 */
final class SemanticTokens
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.16.0
     * @param list<int<0, 2147483647>> $data
     */
    final public function __construct(
        public readonly string $resultId,
        public readonly array $data,
    ) {}
}
