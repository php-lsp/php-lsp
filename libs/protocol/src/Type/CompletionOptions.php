<?php

namespace Lsp\Protocol\Type;

/**
 * Completion options.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
class CompletionOptions
{
    use CompletionOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param list<string> $triggerCharacters
     * @param list<string> $allCommitCharacters
     */
    public function __construct(
        array $triggerCharacters,
        array $allCommitCharacters,
        bool $resolveProvider,
        object $completionItem,
        bool $workDoneProgress,
    ) {
        $this->triggerCharacters = $triggerCharacters;

        $this->allCommitCharacters = $allCommitCharacters;

        $this->resolveProvider = $resolveProvider;

        $this->completionItem = $completionItem;

        $this->workDoneProgress = $workDoneProgress;
    }
}
