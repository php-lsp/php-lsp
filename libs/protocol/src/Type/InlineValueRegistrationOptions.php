<?php

namespace Lsp\Protocol\Type;

/**
 * Inline value options used during static or dynamic registration.
 *
 * @generated
 * @since 3.17.0
 */
final class InlineValueRegistrationOptions
{
    use StaticRegistrationOptionsMixin;

    use InlineValueOptionsMixin;

    use TextDocumentRegistrationOptionsMixin;

    /**
     * @generated
     * @since 3.17.0
     * @param list<object|NotebookCellTextDocumentFilter>|null $documentSelector
     */
    final public function __construct(bool $workDoneProgress, array|null $documentSelector, string $id)
    {
        $this->workDoneProgress = $workDoneProgress;

        $this->documentSelector = $documentSelector;

        $this->id = $id;
    }
}
