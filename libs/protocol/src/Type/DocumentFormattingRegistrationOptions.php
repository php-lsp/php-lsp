<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link DocumentFormattingRequest}.
 *
 * @generated 2024-09-21
 */
final class DocumentFormattingRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;
    use DocumentFormattingOptionsMixin;

    /**
     * @param list<TextDocumentRegistrationOptionsDocumentSelector|NotebookCellTextDocumentFilter>|null $documentSelector
     *        A document selector to identify the scope of the registration. If set to
     *        null the document selector provided on the client side will be used.
     */
    public function __construct(?array $documentSelector = null, ?bool $workDoneProgress = null)
    {
        $this->documentSelector = $documentSelector;
        $this->workDoneProgress = $workDoneProgress;
    }
}
