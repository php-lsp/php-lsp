<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link SignatureHelpRequest}.
 *
 * @generated
 */
final class SignatureHelpRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    use SignatureHelpOptionsMixin;

    /**
     * @param list<object|NotebookCellTextDocumentFilter>|null $documentSelector
     * @param list<string>|null $triggerCharacters
     * @param list<string>|null $retriggerCharacters
     */
    final public function __construct(
        array|null $documentSelector,
        array|null $triggerCharacters = null,
        array|null $retriggerCharacters = null,
        bool|null $workDoneProgress = null,
    ) {
            $this->documentSelector = $documentSelector;
    
            $this->triggerCharacters = $triggerCharacters;
    
            $this->retriggerCharacters = $retriggerCharacters;
    
            $this->workDoneProgress = $workDoneProgress;
    }
}