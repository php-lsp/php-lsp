<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link HoverRequest}.
 *
 * @generated
 */
final class HoverRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    use HoverOptionsMixin;

    /**
     * @param list<object|NotebookCellTextDocumentFilter>|null $documentSelector
     */
    final public function __construct(?array $documentSelector, bool $workDoneProgress)
    {
        $this->documentSelector = $documentSelector;

        $this->workDoneProgress = $workDoneProgress;
    }
}
