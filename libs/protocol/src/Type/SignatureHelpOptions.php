<?php

namespace Lsp\Protocol\Type;

/**
 * Server Capabilities for a {@link SignatureHelpRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
class SignatureHelpOptions
{
    use SignatureHelpOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param list<string> $triggerCharacters
     * @param list<string> $retriggerCharacters
     */
    public function __construct(array $triggerCharacters, array $retriggerCharacters, bool $workDoneProgress)
    {
        $this->triggerCharacters = $triggerCharacters;

        $this->retriggerCharacters = $retriggerCharacters;

        $this->workDoneProgress = $workDoneProgress;
    }
}
