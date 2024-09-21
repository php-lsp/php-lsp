<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.14.0
 *
 * @generated 2024-09-21
 */
final class DeclarationClientCapabilities
{
    public function __construct(
        /**
         * Whether declaration supports dynamic registration. If this is set to
         * `true` the client supports the new `DeclarationRegistrationOptions`
         * return value for the corresponding server capability as well.
         */
        public readonly ?bool $dynamicRegistration = null,
        /**
         * The client supports additional metadata in the form of declaration
         * links.
         */
        public readonly ?bool $linkSupport = null,
    ) {}
}
