<?php

namespace Lsp\Protocol\Type;

/**
 * Type hierarchy options used during static or dynamic registration.
 *
 * @generated
 *
 * @since 3.17.0
 */
final class TypeHierarchyRegistrationOptions
{
    use StaticRegistrationOptionsMixin;

    use TextDocumentRegistrationOptionsMixin;

    use TypeHierarchyOptionsMixin;

    /**
     * @param list<object|NotebookCellTextDocumentFilter>|null $documentSelector
     */
    final public function __construct(?array $documentSelector, bool $workDoneProgress, string $id)
    {
        $this->documentSelector = $documentSelector;

        $this->workDoneProgress = $workDoneProgress;

        $this->id = $id;
    }
}
