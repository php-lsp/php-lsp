<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A notebook document filter where `notebookType` is required field.
 *
 * @since 3.18.0
 */
final class NotebookDocumentFilterNotebookType
{
    public function __construct(
        /**
         * The type of the enclosing notebook.
         */
        public readonly string $notebookType,
        /**
         * A Uri {@see Uri::$scheme scheme}, like `file` or `untitled`.
         */
        public readonly ?string $scheme = null,
        /**
         * A glob pattern.
         */
        public readonly RelativePattern|string|null $pattern = null,
    ) {}
}
