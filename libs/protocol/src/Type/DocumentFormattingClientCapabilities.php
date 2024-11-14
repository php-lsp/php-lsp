<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Client capabilities of a {@link DocumentFormattingRequest}.
 *
 * @generated 2024-11-14
 */
final class DocumentFormattingClientCapabilities
{
    public function __construct(
        /**
         * Whether formatting supports dynamic registration.
         */
        public readonly ?bool $dynamicRegistration = null,
    ) {}
}
