<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Client capabilities specific to inline values.
 *
 * @since 3.17.0
 *
 * @generated 2024-11-15
 */
final class InlineValueClientCapabilities
{
    public function __construct(
        /**
         * Whether implementation supports dynamic registration for inline value
         * providers.
         */
        public readonly ?bool $dynamicRegistration = null,
    ) {}
}
