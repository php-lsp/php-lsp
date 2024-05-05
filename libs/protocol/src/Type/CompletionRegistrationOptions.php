<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link CompletionRequest}.
 *
 * @generated
 */
final class CompletionRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    use CompletionOptionsMixin;

    /**
     * @param list<object|NotebookCellTextDocumentFilter>|null $documentSelector
     * @param list<string> $triggerCharacters
     * @param list<string> $allCommitCharacters
     */
    final public function __construct(
        array|null $documentSelector,
        array $triggerCharacters,
        array $allCommitCharacters,
        bool $resolveProvider,
        CompletionOptionsCompletionItem $completionItem,
        bool $workDoneProgress,
    ) {
        $this->documentSelector = $documentSelector;

        $this->triggerCharacters = $triggerCharacters;

        $this->allCommitCharacters = $allCommitCharacters;

        $this->resolveProvider = $resolveProvider;

        $this->completionItem = $completionItem;

        $this->workDoneProgress = $workDoneProgress;
    }
}
