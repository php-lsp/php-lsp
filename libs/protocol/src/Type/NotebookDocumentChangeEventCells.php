<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 * @internal This class is an internal dependency of {@see NotebookDocumentChangeEvent}
 */
final class NotebookDocumentChangeEventCells
{
    /**
     * @param list<NotebookCell> $data
     * @param list<object> $textContent
     */
    final public function __construct(
        public readonly object $structure,
        public readonly array $data,
        public readonly array $textContent,
    ) {}
}
