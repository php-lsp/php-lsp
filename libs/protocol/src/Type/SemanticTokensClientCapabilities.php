<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 * @since 3.16.0
 */
final class SemanticTokensClientCapabilities
{
    /**
     * @param list<string> $tokenTypes
     * @param list<string> $tokenModifiers
     * @param list<TokenFormat> $formats
     */
    final public function __construct(
        public readonly SemanticTokensClientCapabilitiesRequests $requests,
        public readonly array $tokenTypes,
        public readonly array $tokenModifiers,
        public readonly array $formats,
        public readonly bool|null $dynamicRegistration = null,
        public readonly bool|null $overlappingTokenSupport = null,
        public readonly bool|null $multilineTokenSupport = null,
        public readonly bool|null $serverCancelSupport = null,
        public readonly bool|null $augmentsSyntaxTokens = null,
    ) {}
}