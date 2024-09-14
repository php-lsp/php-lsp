<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 *
 * @since 3.16.0
 */
final class SemanticTokensEdit
{
    /**
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
