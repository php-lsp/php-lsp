<?php

namespace Lsp\Protocol\Type;

/**
 * Client Capabilities for a {@link SignatureHelpRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class SignatureHelpClientCapabilities
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly bool $dynamicRegistration,
        public readonly object $signatureInformation,
        public readonly bool $contextSupport,
    ) {}
}
