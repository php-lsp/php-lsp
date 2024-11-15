<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Save registration options.
 *
 * @generated 2024-11-15
 */
final class TextDocumentSaveRegistrationOptions
{
    public function __construct(
        /**
         * A document selector to identify the scope of the registration. If set
         * to null the document selector provided on the client side will be
         * used.
         *
         * @var list<(TextDocumentFilterLanguage|TextDocumentFilterScheme|TextDocumentFilterPattern|NotebookCellTextDocumentFilter)>|null
         */
        public readonly ?array $documentSelector = null,
        /**
         * The client is supposed to include the content on save.
         */
        public readonly ?bool $includeText = null,
    ) {}
}
