<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A notebook document.
 *
 * @since 3.17.0
 */
final class NotebookDocument
{
    public function __construct(
        /**
         * The notebook document's uri.
         *
         * @var non-empty-string
         */
        public readonly string $uri,
        /**
         * The type of the notebook.
         */
        public readonly string $notebookType,
        /**
         * The version number of this document (it will increase after each
         * change, including undo/redo).
         *
         * @var int<-2147483648, 2147483647>
         */
        public readonly int $version,
        /**
         * Additional metadata stored with the notebook document.
         *
         * Note: should always be an object literal (e.g. LSPObject).
         *
         * @var array<string, mixed>|null
         */
        public readonly ?array $metadata = null,
        /**
         * The cells of a notebook.
         *
         * @var list<NotebookCell>
         */
        public readonly array $cells = [],
    ) {}
}
