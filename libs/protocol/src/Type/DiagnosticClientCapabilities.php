<?php

namespace Lsp\Protocol\Type;

/**
 * Client capabilities specific to diagnostic pull requests.
 *
 * @generated
 *
 * @since 3.17.0
 */
final class DiagnosticClientCapabilities
{
    final public function __construct(
        public readonly bool $dynamicRegistration,
        public readonly bool $relatedDocumentSupport,
    ) {}
}
