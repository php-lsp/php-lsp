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
     * @generated
     */
    final public function __construct(
        array|null $documentSelector,
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
