<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link DocumentSymbolRequest}.
 *
 * @generated
 */
final class DocumentSymbolRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    use DocumentSymbolOptionsMixin;

    /**
     * @param list<object|NotebookCellTextDocumentFilter>|null $documentSelector
     */
    final public function __construct(array|null $documentSelector, string $label, bool $workDoneProgress)
    {
        $this->documentSelector = $documentSelector;

        $this->label = $label;

        $this->workDoneProgress = $workDoneProgress;
    }
}
