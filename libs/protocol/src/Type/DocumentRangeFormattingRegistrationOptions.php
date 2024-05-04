<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link DocumentRangeFormattingRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class DocumentRangeFormattingRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    use DocumentRangeFormattingOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(array|null $documentSelector, bool $rangesSupport, bool $workDoneProgress)
    {
        $this->documentSelector = $documentSelector;

        $this->rangesSupport = $rangesSupport;

        $this->workDoneProgress = $workDoneProgress;
    }
}
