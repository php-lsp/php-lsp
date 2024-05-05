<?php

namespace Lsp\Protocol\Type;

/**
 * Inlay hint client capabilities.
 *
 * @generated
 * @since 3.17.0
 */
final class InlayHintClientCapabilities
{
    final public function __construct(
        public readonly bool $dynamicRegistration,
        public readonly InlayHintClientCapabilitiesResolveSupport $resolveSupport,
    ) {}
}