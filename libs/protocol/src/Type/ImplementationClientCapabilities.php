<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.6.0
 *
 * @generated 2024-11-14
 */
final class ImplementationClientCapabilities
{
    public function __construct(
        /**
         * Whether implementation supports dynamic registration. If this is set
         * to `true` the client supports the new
         * `ImplementationRegistrationOptions` return value for the
         * corresponding server capability as well.
         */
        public readonly ?bool $dynamicRegistration = null,
        /**
         * The client supports additional metadata in the form of definition
         * links.
         *
         * @since 3.14.0
         */
        public readonly ?bool $linkSupport = null,
    ) {}
}
