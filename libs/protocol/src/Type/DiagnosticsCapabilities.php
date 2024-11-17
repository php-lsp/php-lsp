<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * General diagnostics capabilities for pull and push model.
 */
final class DiagnosticsCapabilities
{
    public function __construct(
        /**
         * Whether the clients accepts diagnostics with related information.
         */
        public readonly ?bool $relatedInformation = null,
        /**
         * Client supports the tag property to provide meta data about a
         * diagnostic.
         * Clients supporting tags have to handle unknown tags gracefully.
         *
         * @since 3.15.0
         */
        public readonly ?ClientDiagnosticsTagOptions $tagSupport = null,
        /**
         * Client supports a codeDescription property.
         *
         * @since 3.16.0
         */
        public readonly ?bool $codeDescriptionSupport = null,
        /**
         * Whether code action supports the `data` property which is preserved
         * between a `textDocument/publishDiagnostics` and
         * `textDocument/codeAction` request.
         *
         * @since 3.16.0
         */
        public readonly ?bool $dataSupport = null,
    ) {}
}
