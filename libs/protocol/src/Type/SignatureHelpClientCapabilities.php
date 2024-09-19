<?php

namespace Lsp\Protocol\Type;

/**
 * Client Capabilities for a {@link SignatureHelpRequest}.
 *
 * @generated
 */
final class SignatureHelpClientCapabilities
{
    final public function __construct(
        public readonly bool|null $dynamicRegistration = null,
        public readonly SignatureHelpClientCapabilitiesSignatureInformation|null $signatureInformation = null,
        public readonly bool|null $contextSupport = null,
    ) {}
}