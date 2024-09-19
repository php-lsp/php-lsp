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
        public readonly bool|null $dynamicRegistration = null,
        public readonly InlayHintClientCapabilitiesResolveSupport|null $resolveSupport = null,
    ) {}
}