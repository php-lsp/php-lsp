<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class ImplementationRegistrationOptions
{
    use StaticRegistrationOptionsMixin;

    use TextDocumentRegistrationOptionsMixin;

    use ImplementationOptionsMixin;

    /**
     * @generated
     * @param list<object|NotebookCellTextDocumentFilter>|null $documentSelector
     */
    final public function __construct(array|null $documentSelector, bool $workDoneProgress, string $id)
    {
        $this->documentSelector = $documentSelector;

        $this->workDoneProgress = $workDoneProgress;

        $this->id = $id;
    }
}
