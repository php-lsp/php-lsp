<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Client Capabilities for a {@link SignatureHelpRequest}.
 *
 * @generated 2024-09-21
 */
final class SignatureHelpClientCapabilities
{
    public function __construct(
        /**
         * Whether signature help supports dynamic registration.
         */
        public readonly ?bool $dynamicRegistration = null,
        /**
         * The client supports the following `SignatureInformation` specific
         * properties.
         */
        public readonly ?SignatureHelpClientCapabilitiesSignatureInformation $signatureInformation = null,
        /**
         * The client supports to send additional context information for a
         * `textDocument/signatureHelp` request. A client that opts into
         * contextSupport will also support the `retriggerCharacters` on
         * `SignatureHelpOptions`.
         *
         * @since 3.15.0
         */
        public readonly ?bool $contextSupport = null,
    ) {}
}
