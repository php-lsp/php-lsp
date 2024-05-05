<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class FoldingRangeRegistrationOptions
{
    use StaticRegistrationOptionsMixin;

    use TextDocumentRegistrationOptionsMixin;

    use FoldingRangeOptionsMixin;

    /**
     * @param list<object|NotebookCellTextDocumentFilter>|null $documentSelector
     */
    final public function __construct(array|null $documentSelector, bool $workDoneProgress, string $id)
    {
        $this->documentSelector = $documentSelector;

        $this->workDoneProgress = $workDoneProgress;

        $this->id = $id;
    }
}
