<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
final class NotebookCellTextDocumentFilterNotebook
{
    public function __construct(
        /**
         * A glob pattern.
         */
        public readonly string $pattern,
        /**
         * The type of the enclosing notebook.
         */
        public readonly ?string $notebookType = null,
        /**
         * A Uri {@see Uri::$scheme scheme}, like `file` or `untitled`.
         */
        public readonly ?string $scheme = null,
    ) {}
}
