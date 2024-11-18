<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * General text document registration options.
 */
final class TextDocumentRegistrationOptions
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
    ) {}
}
