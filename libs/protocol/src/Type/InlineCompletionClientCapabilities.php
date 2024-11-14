<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Client capabilities specific to inline completions.
 *
 * @since 3.18.0
 *
 * @internal This is a proposed type, which means that the implementation of
 *           this type is not final. Please use this type at your own risk.
 *
 * @generated 2024-11-14
 */
final class InlineCompletionClientCapabilities
{
    public function __construct(
        /**
         * Whether implementation supports dynamic registration for inline
         * completion providers.
         */
        public readonly ?bool $dynamicRegistration = null,
    ) {}
}
