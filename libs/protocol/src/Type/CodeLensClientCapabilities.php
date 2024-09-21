<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The client capabilities  of a {@link CodeLensRequest}.
 *
 * @generated 2024-09-21
 */
final class CodeLensClientCapabilities
{
    public function __construct(
        /**
         * Whether code lens supports dynamic registration.
         */
        public readonly ?bool $dynamicRegistration = null,
    ) {}
}
