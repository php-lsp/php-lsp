<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Describe options to be used when registered for text document change events.
 *
 * @generated 2024-11-15
 */
final class TextDocumentChangeRegistrationOptions
{
    public function __construct(
        /**
         * How documents are synced to the server.
         */
        public readonly TextDocumentSyncKind $syncKind,
        /**
         * A document selector to identify the scope of the registration. If set
         * to null the document selector provided on the client side will be
         * used.
         *
         * @var list<(TextDocumentFilterLanguage|TextDocumentFilterScheme|TextDocumentFilterPattern|NotebookCellTextDocumentFilter)>|null
         */
        public readonly ?array $documentSelector = null,
    ) {}
}
