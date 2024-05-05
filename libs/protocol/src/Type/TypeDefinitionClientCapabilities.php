<?php

namespace Lsp\Protocol\Type;

/**
 * Since 3.6.0
 *
 * @generated
 */
final class TypeDefinitionClientCapabilities
{
    final public function __construct(
        public readonly bool $dynamicRegistration,
        public readonly bool $linkSupport,
    ) {}
}