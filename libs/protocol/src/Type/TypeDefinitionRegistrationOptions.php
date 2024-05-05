<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class TypeDefinitionRegistrationOptions
{
    use StaticRegistrationOptionsMixin;

    use TextDocumentRegistrationOptionsMixin;

    use TypeDefinitionOptionsMixin;

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
