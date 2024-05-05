<?php

namespace Lsp\Protocol\Type;

/**
 * Completion options.
 *
 * @generated
 */
class CompletionOptions
{
    use CompletionOptionsMixin;

    /**
     * @param list<string> $triggerCharacters
     * @param list<string> $allCommitCharacters
     */
    function __construct(
        array $triggerCharacters,
        array $allCommitCharacters,
        bool $resolveProvider,
        CompletionOptionsCompletionItem $completionItem,
        bool $workDoneProgress,
    ) {
            $this->triggerCharacters = $triggerCharacters;
    
            $this->allCommitCharacters = $allCommitCharacters;
    
            $this->resolveProvider = $resolveProvider;
    
            $this->completionItem = $completionItem;
    
            $this->workDoneProgress = $workDoneProgress;
    }
}