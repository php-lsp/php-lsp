<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.18.0
 */
final class ClientSignatureParameterInformationOptions
{
    public function __construct(
        /**
         * The client supports processing label offsets instead of a simple
         * label string.
         *
         * @since 3.14.0
         */
        public readonly ?bool $labelOffsetSupport = null,
    ) {}
}
