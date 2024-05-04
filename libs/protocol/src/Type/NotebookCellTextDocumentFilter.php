<?php

namespace Lsp\Protocol\Type;

/**
 * A notebook cell text document filter denotes a cell text
 * document by different properties.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
final class NotebookCellTextDocumentFilter
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     */
    final public function __construct(
        public readonly string|object|object|object $notebook,
        public readonly string $language,
    ) {}
}
