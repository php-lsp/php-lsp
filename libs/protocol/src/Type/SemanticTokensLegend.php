<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.16.0
 *
 * @generated 2024-09-21
 */
final class SemanticTokensLegend
{
    public function __construct(
        /**
         * The token types a server uses.
         *
         * @var list<string>
         */
        public readonly array $tokenTypes = [],
        /**
         * The token modifiers a server uses.
         *
         * @var list<string>
         */
        public readonly array $tokenModifiers = [],
    ) {}
}
