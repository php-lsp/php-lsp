<?php

namespace Lsp\Protocol\Type;

/**
 * Client capabilities specific to inline values.
 *
 * @generated
 * @since 3.17.0
 */
final class InlineValueClientCapabilities
{
    final public function __construct(
        public readonly bool|null $dynamicRegistration = null,
    ) {}
}