<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link SignatureHelpRequest}.
 *
 * @generated 2024-11-14
 */
final class SignatureHelpRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;
    use SignatureHelpOptionsMixin;

    /**
     * @param list<(TextDocumentFilterLanguage|TextDocumentFilterScheme|TextDocumentFilterPattern|NotebookCellTextDocumentFilter)>|null $documentSelector
     *        A document selector to identify the scope of the registration. If set to
     *        null the document selector provided on the client side will be used.
     * @param list<string>|null $triggerCharacters list of characters that
     *        trigger signature help automatically
     * @param list<string>|null $retriggerCharacters List of characters that
     *        re-trigger signature help.
     *
     *        These trigger characters are only active when signature help is already
     *        showing. All trigger characters are also counted as re-trigger
     *        characters.
     */
    public function __construct(
        ?array $documentSelector = null,
        ?array $triggerCharacters = null,
        ?array $retriggerCharacters = null,
        ?bool $workDoneProgress = null,
    ) {
        $this->documentSelector = $documentSelector;
        $this->triggerCharacters = $triggerCharacters;
        $this->retriggerCharacters = $retriggerCharacters;
        $this->workDoneProgress = $workDoneProgress;
    }
}
