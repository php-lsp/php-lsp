<?php

namespace Lsp\Protocol\Type;

/**
 * Save registration options.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class TextDocumentSaveRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    use SaveOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(array|null $documentSelector, bool $includeText)
    {
        $this->documentSelector = $documentSelector;

        $this->includeText = $includeText;
    }
}
