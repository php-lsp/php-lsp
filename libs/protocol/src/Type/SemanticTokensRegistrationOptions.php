<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.16.0
 *
 * @generated 2024-11-14
 */
final class SemanticTokensRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;
    use SemanticTokensOptionsMixin;
    use StaticRegistrationOptionsMixin;

    /**
     * @param list<(TextDocumentFilterLanguage|TextDocumentFilterScheme|TextDocumentFilterPattern|NotebookCellTextDocumentFilter)>|null $documentSelector
     *        A document selector to identify the scope of the registration. If set to
     *        null the document selector provided on the client side will be used.
     * @param SemanticTokensLegend $legend The legend used by the server
     * @param bool|SemanticTokensOptionsRange|null $range server supports
     *        providing semantic tokens for a specific range of a document
     * @param bool|SemanticTokensFullDelta|null $full server supports providing
     *        semantic tokens for a full document
     * @param string|null $id The id used to register the request. The id can be
     *        used to deregister the request again. See also Registration#id.
     */
    public function __construct(
        SemanticTokensLegend $legend,
        ?array $documentSelector = null,
        bool|SemanticTokensOptionsRange|null $range = null,
        bool|SemanticTokensFullDelta|null $full = null,
        ?bool $workDoneProgress = null,
        ?string $id = null,
    ) {
        $this->documentSelector = $documentSelector;
        $this->legend = $legend;
        $this->range = $range;
        $this->full = $full;
        $this->workDoneProgress = $workDoneProgress;
        $this->id = $id;
    }
}
