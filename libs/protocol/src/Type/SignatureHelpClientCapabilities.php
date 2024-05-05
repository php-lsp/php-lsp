<?php

namespace Lsp\Protocol\Type;

/**
 * Client Capabilities for a {@link SignatureHelpRequest}.
 *
 * @generated
 */
final class SignatureHelpClientCapabilities
{
    /**
     * @generated
     */
    final public function __construct(
        public readonly bool $dynamicRegistration,
        public readonly object $signatureInformation,
        public readonly bool $contextSupport,
    ) {}
}
