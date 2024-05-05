<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link DocumentRangeFormattingRequest}.
 *
 * @generated
 */
final class DocumentRangeFormattingRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    use DocumentRangeFormattingOptionsMixin;

    /**
     * @generated
     * @param list<object|NotebookCellTextDocumentFilter>|null $documentSelector
     */
    final public function __construct(array|null $documentSelector, bool $rangesSupport, bool $workDoneProgress)
    {
        $this->documentSelector = $documentSelector;

        $this->rangesSupport = $rangesSupport;

        $this->workDoneProgress = $workDoneProgress;
    }
}
