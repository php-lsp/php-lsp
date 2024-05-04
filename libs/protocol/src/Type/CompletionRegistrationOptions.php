<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link CompletionRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class CompletionRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    use CompletionOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        array|null $documentSelector,
        array $triggerCharacters,
        array $allCommitCharacters,
        bool $resolveProvider,
        object $completionItem,
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
