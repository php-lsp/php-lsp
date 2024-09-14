<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link DefinitionRequest}.
 *
 * @generated
 */
final class DefinitionRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    use DefinitionOptionsMixin;

    /**
     * @param list<object|NotebookCellTextDocumentFilter>|null $documentSelector
     */
    final public function __construct(?array $documentSelector, bool $workDoneProgress)
    {
        $this->documentSelector = $documentSelector;

        $this->workDoneProgress = $workDoneProgress;
    }
}
