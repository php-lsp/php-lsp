<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link DocumentSymbolRequest}.
 *
 * @generated 2024-11-15
 */
final class DocumentSymbolRegistrationOptions
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
         * A human-readable string that is shown when multiple outlines trees
         * are shown for the same document.
         *
         * @since 3.16.0
         */
        public readonly ?string $label = null,
        public readonly ?bool $workDoneProgress = null,
    ) {}
}
