<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link DocumentSymbolRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class DocumentSymbolRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    use DocumentSymbolOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(array|null $documentSelector, string $label, bool $workDoneProgress)
    {
        $this->documentSelector = $documentSelector;

        $this->label = $label;

        $this->workDoneProgress = $workDoneProgress;
    }
}
