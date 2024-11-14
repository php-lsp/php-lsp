<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Client capabilities specific to diagnostic pull requests.
 *
 * @since 3.17.0
 *
 * @generated 2024-11-14
 */
final class DiagnosticClientCapabilities
{
    use DiagnosticsCapabilitiesMixin;

    /**
     * @param bool|null $relatedInformation whether the clients accepts
     *        diagnostics with related information
     * @param ClientDiagnosticsTagOptions|null $tagSupport Client supports the
     *        tag property to provide meta data about a diagnostic.
     *        Clients supporting tags have to handle unknown tags gracefully.
     * @param bool|null $codeDescriptionSupport Client supports a
     *        codeDescription property
     * @param bool|null $dataSupport whether code action supports the `data`
     *        property which is preserved between a `textDocument/publishDiagnostics`
     *        and `textDocument/codeAction` request
     */
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
        ?bool $relatedInformation = null,
        ?ClientDiagnosticsTagOptions $tagSupport = null,
        ?bool $codeDescriptionSupport = null,
        ?bool $dataSupport = null,
    ) {
        $this->relatedInformation = $relatedInformation;
        $this->tagSupport = $tagSupport;
        $this->codeDescriptionSupport = $codeDescriptionSupport;
        $this->dataSupport = $dataSupport;
    }
}
