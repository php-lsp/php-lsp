<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Client capabilities of a {@link DocumentOnTypeFormattingRequest}.
 *
 * @generated 2024-11-14
 */
final class DocumentOnTypeFormattingClientCapabilities
{
    public function __construct(
        /**
         * Whether on type formatting supports dynamic registration.
         */
        public readonly ?bool $dynamicRegistration = null,
    ) {}
}
