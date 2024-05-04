<?php

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.16.0
 */
final class SemanticTokensEdit
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.16.0
     * @param int<0, 2147483647> $start
     * @param int<0, 2147483647> $deleteCount
     * @param list<int<0, 2147483647>> $data
     */
    final public function __construct(
        public readonly int $start,
        public readonly int $deleteCount,
        public readonly array $data,
    ) {}
}
