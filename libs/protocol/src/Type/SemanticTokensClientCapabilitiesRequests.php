<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 * @internal This class is an internal dependency of {@see SemanticTokensClientCapabilities}
 */
final class SemanticTokensClientCapabilitiesRequests
{
    final public function __construct(
        public readonly bool|object $range,
        public readonly bool|object $full,
    ) {}
}
