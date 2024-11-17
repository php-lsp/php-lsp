<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * An item to transfer a text document from the client to the server.
 */
final class TextDocumentItem
{
    public function __construct(
        /**
         * The text document's uri.
         *
         * @var non-empty-string
         */
        public readonly string $uri,
        /**
         * The text document's language identifier.
         */
        public readonly LanguageKind $languageId,
        /**
         * The version number of this document (it will increase after each
         * change, including undo/redo).
         *
         * @var int<-2147483648, 2147483647>
         */
        public readonly int $version,
        /**
         * The content of the opened text document.
         */
        public readonly string $text,
    ) {}
}
