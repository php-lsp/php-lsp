<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Describe options to be used when registered for text document change events.
 *
 * @generated 2024-09-21
 */
final class TextDocumentChangeRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    /**
     * @param list<TextDocumentRegistrationOptionsDocumentSelector|NotebookCellTextDocumentFilter>|null $documentSelector
     *        A document selector to identify the scope of the registration. If set to
     *        null the document selector provided on the client side will be used.
     */
    public function __construct(
        /**
         * How documents are synced to the server.
         */
        public readonly TextDocumentSyncKind $syncKind,
        ?array $documentSelector = null,
    ) {
        $this->documentSelector = $documentSelector;
    }
}
