<?php

namespace Lsp\Protocol\Type;

/**
 * Client Capabilities for a {@link DefinitionRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class DefinitionClientCapabilities
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly bool $dynamicRegistration,
        public readonly bool $linkSupport,
    ) {}
}
