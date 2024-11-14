<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Save registration options.
 *
 * @generated 2024-11-14
 */
final class TextDocumentSaveRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;
    use SaveOptionsMixin;

    /**
     * @param list<(TextDocumentFilterLanguage|TextDocumentFilterScheme|TextDocumentFilterPattern|NotebookCellTextDocumentFilter)>|null $documentSelector
     *        A document selector to identify the scope of the registration. If set to
     *        null the document selector provided on the client side will be used.
     * @param bool|null $includeText the client is supposed to include the
     *        content on save
     */
    public function __construct(?array $documentSelector = null, ?bool $includeText = null)
    {
        $this->documentSelector = $documentSelector;
        $this->includeText = $includeText;
    }
}
