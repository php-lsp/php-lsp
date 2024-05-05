<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link DocumentHighlightRequest}.
 *
 * @generated
 */
final class DocumentHighlightRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    use DocumentHighlightOptionsMixin;

    /**
     * @generated
     */
    final public function __construct(array|null $documentSelector, bool $workDoneProgress)
    {
        $this->documentSelector = $documentSelector;

        $this->workDoneProgress = $workDoneProgress;
    }
}
