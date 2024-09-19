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
     * @param list<string>|null $triggerCharacters
     * @param list<string>|null $allCommitCharacters
     */
    public function __construct(
        array|null $triggerCharacters,
        array|null $allCommitCharacters,
        bool|null $resolveProvider,
        CompletionOptionsCompletionItem|null $completionItem,
        bool|null $workDoneProgress,
    ) {
            $this->triggerCharacters = $triggerCharacters;
    
            $this->allCommitCharacters = $allCommitCharacters;
    
            $this->resolveProvider = $resolveProvider;
    
            $this->completionItem = $completionItem;
    
            $this->workDoneProgress = $workDoneProgress;
    }
}