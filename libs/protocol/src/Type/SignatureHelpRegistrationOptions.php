<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link SignatureHelpRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class SignatureHelpRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    use SignatureHelpOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
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
