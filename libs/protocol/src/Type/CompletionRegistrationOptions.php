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
     * @param list<string>|null $triggerCharacters
     * @param list<string>|null $allCommitCharacters
     */
    final public function __construct(
        array|null $documentSelector,
        array|null $triggerCharacters = null,
        array|null $allCommitCharacters = null,
        bool|null $resolveProvider = null,
        CompletionOptionsCompletionItem|null $completionItem = null,
        bool|null $workDoneProgress = null,
    ) {
            $this->documentSelector = $documentSelector;
    
            $this->triggerCharacters = $triggerCharacters;
    
            $this->allCommitCharacters = $allCommitCharacters;
    
            $this->resolveProvider = $resolveProvider;
    
            $this->completionItem = $completionItem;
    
            $this->workDoneProgress = $workDoneProgress;
    }
}