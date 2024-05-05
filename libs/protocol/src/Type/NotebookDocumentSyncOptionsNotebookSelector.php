<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 * @internal This class is an internal dependency of {@see NotebookDocumentSyncOptions}
 */
final class NotebookDocumentSyncOptionsNotebookSelector
{
    /**
     * @param list<object> $cells
     */
    final public function __construct(
        public readonly string|object|object|object $notebook,
        public readonly array $cells,
    ) {}
}