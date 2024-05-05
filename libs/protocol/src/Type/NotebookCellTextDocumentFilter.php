<?php

namespace Lsp\Protocol\Type;

/**
 * A notebook cell text document filter denotes a cell text
 * document by different properties.
 *
 * @generated
 * @since 3.17.0
 */
final class NotebookCellTextDocumentFilter
{
    final public function __construct(
        public readonly string|object|object|object $notebook,
        public readonly string $language,
    ) {}
}
