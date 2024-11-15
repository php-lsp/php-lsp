<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-11-15
 */
final class SelectionRangeClientCapabilities
{
    public function __construct(
        /**
         * Whether implementation supports dynamic registration for selection
         * range providers. If this is set to `true` the client supports the new
         * `SelectionRangeRegistrationOptions` return value for the
         * corresponding server capability as well.
         */
        public readonly ?bool $dynamicRegistration = null,
    ) {}
}
