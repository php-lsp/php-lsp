<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Client capabilities of a {@link DocumentRangeFormattingRequest}.
 *
 * @generated 2024-11-15
 */
final class DocumentRangeFormattingClientCapabilities
{
    public function __construct(
        /**
         * Whether range formatting supports dynamic registration.
         */
        public readonly ?bool $dynamicRegistration = null,
        /**
         * Whether the client supports formatting multiple ranges at once.
         *
         * @since 3.18.0
         *
         * @internal This is a proposed type, which means that the
         *           implementation of this type is not final. Please use this type at
         *           your own risk.
         */
        public readonly ?bool $rangesSupport = null,
    ) {}
}
