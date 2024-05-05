<?php

namespace Lsp\Protocol\Type;

/**
 * Save registration options.
 *
 * @generated
 */
final class TextDocumentSaveRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    use SaveOptionsMixin;

    /**
     * @generated
     */
    final public function __construct(array|null $documentSelector, bool $includeText)
    {
        $this->documentSelector = $documentSelector;

        $this->includeText = $includeText;
    }
}
