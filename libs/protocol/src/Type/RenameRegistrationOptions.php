<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link RenameRequest}.
 *
 * @generated 2024-11-15
 */
final class RenameRegistrationOptions
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
         * Renames should be checked and tested before being executed.
         *
         * @since version 3.12.0
         */
        public readonly ?bool $prepareProvider = null,
        public readonly ?bool $workDoneProgress = null,
    ) {}
}
