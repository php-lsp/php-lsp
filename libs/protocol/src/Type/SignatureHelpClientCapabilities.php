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
        public readonly bool $dynamicRegistration,
        public readonly SignatureHelpClientCapabilitiesSignatureInformation $signatureInformation,
        public readonly bool $contextSupport,
    ) {}
}