<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-11-14
 */
final class ServerCapabilitiesTextDocument
{
    public function __construct(
        /**
         * Capabilities specific to the diagnostic pull model.
         *
         * @since 3.18.0
         */
        public readonly ?ServerCapabilitiesTextDocumentDiagnostic $diagnostic = null,
    ) {}
}
