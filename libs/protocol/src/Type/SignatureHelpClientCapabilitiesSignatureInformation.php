<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
final class SignatureHelpClientCapabilitiesSignatureInformation
{
    public function __construct(
        /**
         * Client supports the following content formats for the documentation
         * property. The order describes the preferred format of the client.
         *
         * @var list<MarkupKind>|null
         */
        public readonly ?array $documentationFormat = null,
        /**
         * Client capabilities specific to parameter information.
         */
        public readonly ?SignatureHelpClientCapabilitiesSignatureInformationParameterInformation $parameterInformation = null,
        /**
         * The client supports the `activeParameter` property on
         * `SignatureInformation` literal.
         *
         * @since 3.16.0
         */
        public readonly ?bool $activeParameterSupport = null,
        /**
         * The client supports the `activeParameter` property on
         * `SignatureInformation` being set to `null` to indicate that no
         * parameter should be active.
         *
         * @since 3.18.0
         */
        public readonly ?bool $noActiveParameterSupport = null,
    ) {}
}
