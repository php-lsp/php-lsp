<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link DocumentFormattingRequest}.
 *
 * @generated
 */
final class DocumentFormattingRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    use DocumentFormattingOptionsMixin;

    /**
     * @generated
     * @param list<object|NotebookCellTextDocumentFilter>|null $documentSelector
     */
    final public function __construct(array|null $documentSelector, bool $workDoneProgress)
    {
        $this->documentSelector = $documentSelector;

        $this->workDoneProgress = $workDoneProgress;
    }
}
