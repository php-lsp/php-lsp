<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The publish diagnostic client capabilities.
 *
 * @generated 2024-11-14
 */
final class PublishDiagnosticsClientCapabilities
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
         * Whether the client interprets the version property of the
         * `textDocument/publishDiagnostics` notification's parameter.
         *
         * @since 3.15.0
         */
        public readonly ?bool $versionSupport = null,
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
