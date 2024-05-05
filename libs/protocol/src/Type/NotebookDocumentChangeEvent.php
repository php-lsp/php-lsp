<?php

namespace Lsp\Protocol\Type;

/**
 * A change event for a notebook document.
 *
 * @generated
 * @since 3.17.0
 */
final class NotebookDocumentChangeEvent
{
    /**
     * @param array<string, mixed> $metadata
     */
    final public function __construct(
        public readonly array $metadata,
        public readonly NotebookDocumentChangeEventCells $cells,
    ) {}
}
