<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Client capabilities specific to the moniker request.
 *
 * @since 3.16.0
 *
 * @generated 2024-11-15
 */
final class MonikerClientCapabilities
{
    public function __construct(
        /**
         * Whether moniker supports dynamic registration. If this is set to
         * `true` the client supports the new `MonikerRegistrationOptions`
         * return value for the corresponding server capability as well.
         */
        public readonly ?bool $dynamicRegistration = null,
    ) {}
}
