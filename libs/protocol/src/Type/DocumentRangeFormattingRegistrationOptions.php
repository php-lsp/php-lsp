<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link DocumentRangeFormattingRequest}.
 *
 * @generated 2024-09-21
 */
final class DocumentRangeFormattingRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;
    use DocumentRangeFormattingOptionsMixin;

    /**
     * @param list<TextDocumentRegistrationOptionsDocumentSelector|NotebookCellTextDocumentFilter>|null $documentSelector
     *        A document selector to identify the scope of the registration. If set to
     *        null the document selector provided on the client side will be used.
     * @param bool|null $rangesSupport whether the server supports formatting
     *        multiple ranges at once
     */
    public function __construct(?array $documentSelector = null, ?bool $rangesSupport = null, ?bool $workDoneProgress = null)
    {
        $this->documentSelector = $documentSelector;
        $this->rangesSupport = $rangesSupport;
        $this->workDoneProgress = $workDoneProgress;
    }
}
