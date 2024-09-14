<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 *
 * @since 3.16.0
 */
final class SemanticTokensPartialResult
{
    /**
     * @param list<int<0, 2147483647>> $data
     */
    final public function __construct(
        public readonly array $data,
    ) {}
}
