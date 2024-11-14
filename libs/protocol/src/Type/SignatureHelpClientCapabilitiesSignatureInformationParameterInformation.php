<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-11-14
 */
final class SignatureHelpClientCapabilitiesSignatureInformationParameterInformation
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
