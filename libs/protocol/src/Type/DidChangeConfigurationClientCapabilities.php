<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-11-14
 */
final class DidChangeConfigurationClientCapabilities
{
    public function __construct(
        /**
         * Did change configuration notification supports dynamic registration.
         */
        public readonly ?bool $dynamicRegistration = null,
    ) {}
}
