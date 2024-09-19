<?php

namespace Lsp\Protocol\Type;

/**
 * Client Capabilities for a {@link DefinitionRequest}.
 *
 * @generated
 */
final class DefinitionClientCapabilities
{
    final public function __construct(
        public readonly bool|null $dynamicRegistration = null,
        public readonly bool|null $linkSupport = null,
    ) {}
}