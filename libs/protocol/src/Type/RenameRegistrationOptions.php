<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link RenameRequest}.
 *
 * @generated
 */
final class RenameRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    use RenameOptionsMixin;

    /**
     * @generated
     * @param list<object|NotebookCellTextDocumentFilter>|null $documentSelector
     */
    final public function __construct(array|null $documentSelector, bool $prepareProvider, bool $workDoneProgress)
    {
        $this->documentSelector = $documentSelector;

        $this->prepareProvider = $prepareProvider;

        $this->workDoneProgress = $workDoneProgress;
    }
}
