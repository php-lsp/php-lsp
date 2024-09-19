<?php

namespace Lsp\Protocol\Type;

/**
 * Server Capabilities for a {@link SignatureHelpRequest}.
 *
 * @generated
 */
class SignatureHelpOptions
{
    use SignatureHelpOptionsMixin;

    /**
     * @param list<string>|null $triggerCharacters
     * @param list<string>|null $retriggerCharacters
     */
    public function __construct(array|null $triggerCharacters, array|null $retriggerCharacters, bool|null $workDoneProgress)
    {
            $this->triggerCharacters = $triggerCharacters;
    
            $this->retriggerCharacters = $retriggerCharacters;
    
            $this->workDoneProgress = $workDoneProgress;
    }
}