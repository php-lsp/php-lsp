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
     * @param list<string> $triggerCharacters
     * @param list<string> $retriggerCharacters
     */
    function __construct(array $triggerCharacters, array $retriggerCharacters, bool $workDoneProgress)
    {
            $this->triggerCharacters = $triggerCharacters;
    
            $this->retriggerCharacters = $retriggerCharacters;
    
            $this->workDoneProgress = $workDoneProgress;
    }
}