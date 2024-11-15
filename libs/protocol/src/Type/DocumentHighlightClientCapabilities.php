<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Client Capabilities for a {@link DocumentHighlightRequest}.
 *
 * @generated 2024-11-15
 */
final class DocumentHighlightClientCapabilities
{
    public function __construct(
        /**
         * Whether document highlight supports dynamic registration.
         */
        public readonly ?bool $dynamicRegistration = null,
    ) {}
}
