<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 *
 * @since 3.16.0
 */
final class SemanticTokensRegistrationOptions
{
    use StaticRegistrationOptionsMixin;

    use TextDocumentRegistrationOptionsMixin;

    use SemanticTokensOptionsMixin;

    /**
     * @param list<object|NotebookCellTextDocumentFilter>|null $documentSelector
     */
    final public function __construct(
        ?array $documentSelector,
        SemanticTokensLegend $legend,
        bool|SemanticTokensOptionsRange $range,
        bool|SemanticTokensOptionsFull $full,
        bool $workDoneProgress,
        string $id,
    ) {
        $this->documentSelector = $documentSelector;

        $this->legend = $legend;

        $this->range = $range;

        $this->full = $full;

        $this->workDoneProgress = $workDoneProgress;

        $this->id = $id;
    }
}
