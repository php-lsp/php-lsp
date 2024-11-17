<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link DocumentOnTypeFormattingRequest}.
 */
final class DocumentOnTypeFormattingRegistrationOptions
{
    public function __construct(
        /**
         * A character on which formatting should be triggered, like `{`.
         */
        public readonly string $firstTriggerCharacter,
        /**
         * A document selector to identify the scope of the registration. If set
         * to null the document selector provided on the client side will be
         * used.
         *
         * @var list<(TextDocumentFilterLanguage|TextDocumentFilterScheme|TextDocumentFilterPattern|NotebookCellTextDocumentFilter)>|null
         */
        public readonly ?array $documentSelector = null,
        /**
         * More trigger characters.
         *
         * @var list<string>|null
         */
        public readonly ?array $moreTriggerCharacter = null,
    ) {}
}
