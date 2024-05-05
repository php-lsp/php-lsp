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
    /**
     * @generated
     * @since 3.17.0
     */
    final public function __construct(
        public readonly bool $dynamicRegistration,
        public readonly object $resolveSupport,
    ) {}
}
