<?php

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.16.0
 */
final class SemanticTokensClientCapabilities
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.16.0
     * @param list<string> $tokenTypes
     * @param list<string> $tokenModifiers
     * @param list<TokenFormat> $formats
     */
    final public function __construct(
        public readonly bool $dynamicRegistration,
        public readonly object $requests,
        public readonly array $tokenTypes,
        public readonly array $tokenModifiers,
        public readonly array $formats,
        public readonly bool $overlappingTokenSupport,
        public readonly bool $multilineTokenSupport,
        public readonly bool $serverCancelSupport,
        public readonly bool $augmentsSyntaxTokens,
    ) {}
}
