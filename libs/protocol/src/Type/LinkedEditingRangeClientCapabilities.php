<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Client capabilities for the linked editing range request.
 *
 * @since 3.16.0
 *
 * @generated 2024-09-21
 */
final class LinkedEditingRangeClientCapabilities
{
    public function __construct(
        /**
         * Whether implementation supports dynamic registration. If this is set
         * to `true` the client supports the new
         * `(TextDocumentRegistrationOptions & StaticRegistrationOptions)`
         * return value for the corresponding server capability as well.
         */
        public readonly ?bool $dynamicRegistration = null,
    ) {}
}
