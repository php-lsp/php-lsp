<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link ReferencesRequest}.
 *
 * @generated 2024-11-14
 */
final class ReferenceRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;
    use ReferenceOptionsMixin;

    /**
     * @param list<(TextDocumentRegistrationOptionsDocumentSelector|NotebookCellTextDocumentFilter)>|null $documentSelector
     *        A document selector to identify the scope of the registration. If set to
     *        null the document selector provided on the client side will be used.
     */
    public function __construct(?array $documentSelector = null, ?bool $workDoneProgress = null)
    {
        $this->documentSelector = $documentSelector;
        $this->workDoneProgress = $workDoneProgress;
    }
}
