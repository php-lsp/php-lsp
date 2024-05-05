<?php

namespace Lsp\Protocol\Type;

/**
 * Call hierarchy options used during static or dynamic registration.
 *
 * @generated
 * @since 3.16.0
 */
final class CallHierarchyRegistrationOptions
{
    use StaticRegistrationOptionsMixin;

    use TextDocumentRegistrationOptionsMixin;

    use CallHierarchyOptionsMixin;

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
