<?php

namespace Lsp\Protocol\Type;

/**
 * Inline completion options used during static or dynamic registration.
 *
 * @generated
 * @since 3.18.0
 * @internal Describes the upcoming version of the Language Server Protocol and is under development
 */
final class InlineCompletionRegistrationOptions
{
    use StaticRegistrationOptionsMixin;

    use InlineCompletionOptionsMixin;

    use TextDocumentRegistrationOptionsMixin;

    /**
     * @generated
     * @since 3.18.0
     * @internal Describes the upcoming version of the Language Server Protocol and is under development
     * @param list<object|NotebookCellTextDocumentFilter>|null $documentSelector
     */
    final public function __construct(bool $workDoneProgress, array|null $documentSelector, string $id)
    {
        $this->workDoneProgress = $workDoneProgress;

        $this->documentSelector = $documentSelector;

        $this->id = $id;
    }
}
