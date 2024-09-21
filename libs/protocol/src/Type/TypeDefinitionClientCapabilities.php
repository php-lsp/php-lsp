<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Since 3.6.0.
 *
 * @generated 2024-09-21
 */
final class TypeDefinitionClientCapabilities
{
    public function __construct(
        /**
         * Whether implementation supports dynamic registration. If this is set
         * to `true` the client supports the new
         * `TypeDefinitionRegistrationOptions` return value for the
         * corresponding server capability as well.
         */
        public readonly ?bool $dynamicRegistration = null,
        /**
         * The client supports additional metadata in the form of definition
         * links.
         *
         * Since 3.14.0.
         */
        public readonly ?bool $linkSupport = null,
    ) {}
}
