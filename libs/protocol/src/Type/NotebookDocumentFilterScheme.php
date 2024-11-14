<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A notebook document filter where `scheme` is required field.
 *
 * @since 3.18.0
 *
 * @generated 2024-11-14
 */
final class NotebookDocumentFilterScheme
{
    public function __construct(
        /**
         * A Uri {@see Uri::$scheme scheme}, like `file` or `untitled`.
         */
        public readonly string $scheme,
        /**
         * The type of the enclosing notebook.
         */
        public readonly ?string $notebookType = null,
        /**
         * A glob pattern.
         */
        public readonly string|RelativePattern|null $pattern = null,
    ) {}
}
