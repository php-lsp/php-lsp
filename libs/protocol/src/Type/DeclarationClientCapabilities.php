<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 * @since 3.14.0
 */
final class DeclarationClientCapabilities
{
    final public function __construct(
        public readonly bool|null $dynamicRegistration = null,
        public readonly bool|null $linkSupport = null,
    ) {}
}