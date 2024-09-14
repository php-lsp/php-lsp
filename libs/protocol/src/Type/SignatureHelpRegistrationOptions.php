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
     * @param list<string> $triggerCharacters
     * @param list<string> $retriggerCharacters
     */
    final public function __construct(
        ?array $documentSelector,
        array $triggerCharacters,
        array $retriggerCharacters,
        bool $workDoneProgress,
    ) {
        $this->documentSelector = $documentSelector;

        $this->triggerCharacters = $triggerCharacters;

        $this->retriggerCharacters = $retriggerCharacters;

        $this->workDoneProgress = $workDoneProgress;
    }
}
