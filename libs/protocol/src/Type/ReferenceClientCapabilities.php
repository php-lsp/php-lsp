<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Client Capabilities for a {@link ReferencesRequest}.
 *
 * @generated 2024-11-15
 */
final class ReferenceClientCapabilities
{
    public function __construct(
        /**
         * Whether references supports dynamic registration.
         */
        public readonly ?bool $dynamicRegistration = null,
    ) {}
}
