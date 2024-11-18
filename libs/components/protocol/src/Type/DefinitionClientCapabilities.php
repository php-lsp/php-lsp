<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Client Capabilities for a {@link DefinitionRequest}.
 */
final class DefinitionClientCapabilities
{
    public function __construct(
        /**
         * Whether definition supports dynamic registration.
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
