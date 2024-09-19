<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 * @since 3.6.0
 */
final class ImplementationClientCapabilities
{
    final public function __construct(
        public readonly bool|null $dynamicRegistration = null,
        public readonly bool|null $linkSupport = null,
    ) {}
}