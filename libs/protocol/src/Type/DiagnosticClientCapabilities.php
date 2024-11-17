<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Client capabilities specific to diagnostic pull requests.
 *
 * @since 3.17.0
 */
final class DiagnosticClientCapabilities
{
    public function __construct(
        /**
         * Whether implementation supports dynamic registration. If this is set
         * to `true` the client supports the new
         * `(TextDocumentRegistrationOptions & StaticRegistrationOptions)`
         * return value for the corresponding server capability as well.
         */
        public readonly ?bool $dynamicRegistration = null,
        /**
         * Whether the clients supports related documents for document
         * diagnostic pulls.
         */
        public readonly ?bool $relatedDocumentSupport = null,
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
