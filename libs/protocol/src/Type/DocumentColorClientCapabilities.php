<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
final class DocumentColorClientCapabilities
{
    public function __construct(
        /**
         * Whether implementation supports dynamic registration. If this is set
         * to `true` the client supports the new
         * `DocumentColorRegistrationOptions` return value for the corresponding
         * server capability as well.
         */
        public readonly ?bool $dynamicRegistration = null,
    ) {}
}
