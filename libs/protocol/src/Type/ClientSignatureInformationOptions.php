<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.18.0
 *
 * @generated 2024-11-14
 */
final class ClientSignatureInformationOptions
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
        public readonly ?ClientSignatureParameterInformationOptions $parameterInformation = null,
        /**
         * The client supports the `activeParameter` property on
         * `SignatureInformation` literal.
         *
         * @since 3.16.0
         */
        public readonly ?bool $activeParameterSupport = null,
        /**
         * The client supports the `activeParameter` property on
         * `SignatureHelp`/`SignatureInformation` being set to `null` to
         * indicate that no parameter should be active.
         *
         * @since 3.18.0
         *
         * @internal This is a proposed type, which means that the
         *           implementation of this type is not final. Please use this type at
         *           your own risk.
         */
        public readonly ?bool $noActiveParameterSupport = null,
    ) {}
}
