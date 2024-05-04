<?php

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.16.0
 */
final class SemanticTokensLegend
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.16.0
     * @param list<string> $tokenTypes
     * @param list<string> $tokenModifiers
     */
    final public function __construct(
        public readonly array $tokenTypes,
        public readonly array $tokenModifiers,
    ) {}
}
