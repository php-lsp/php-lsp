<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class SelectionRangeRegistrationOptions
{
    use StaticRegistrationOptionsMixin;

    use SelectionRangeOptionsMixin;

    use TextDocumentRegistrationOptionsMixin;

    /**
     * @param list<object|NotebookCellTextDocumentFilter>|null $documentSelector
     */
    final public function __construct(bool $workDoneProgress, array|null $documentSelector, string $id)
    {
        $this->workDoneProgress = $workDoneProgress;

        $this->documentSelector = $documentSelector;

        $this->id = $id;
    }
}
