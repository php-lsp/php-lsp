<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 * @since 3.16.0
 */
final class SemanticTokensLegend
{
    /**
     * @param list<string> $tokenTypes
     * @param list<string> $tokenModifiers
     */
    final public function __construct(
        public readonly array $tokenTypes,
        public readonly array $tokenModifiers,
    ) {}
}