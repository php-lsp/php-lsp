<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The client capabilities of a {@link ExecuteCommandRequest}.
 *
 * @generated 2024-11-15
 */
final class ExecuteCommandClientCapabilities
{
    public function __construct(
        /**
         * Execute command supports dynamic registration.
         */
        public readonly ?bool $dynamicRegistration = null,
    ) {}
}
