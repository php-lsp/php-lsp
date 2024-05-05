<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class MonikerRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    use MonikerOptionsMixin;

    /**
     * @param list<object|NotebookCellTextDocumentFilter>|null $documentSelector
     */
    final public function __construct(array|null $documentSelector, bool $workDoneProgress)
    {
        $this->documentSelector = $documentSelector;

        $this->workDoneProgress = $workDoneProgress;
    }
}
