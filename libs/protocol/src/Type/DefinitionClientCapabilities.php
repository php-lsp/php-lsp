<?php

namespace Lsp\Protocol\Type;

/**
 * Client Capabilities for a {@link DefinitionRequest}.
 *
 * @generated
 */
final class DefinitionClientCapabilities
{
    /**
     * @generated
     */
    final public function __construct(
        public readonly bool $dynamicRegistration,
        public readonly bool $linkSupport,
    ) {}
}
